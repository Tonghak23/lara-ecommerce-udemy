<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
class BrandController extends Controller
{
    public function list() {
        $list = Brand::latest()->get();
        return view('admin.products.brands.list',compact('list'));
    }
    public function form() {
        return view('admin.products.brands.form');
    }
    public function store(Request $request) {
        $validateData = $request->validate(
            [
                'name'  => 'required|unique:brands|min:4',
                'brand_image'  => 'required|mimes:jpg,jpeg,png',
            ],
            [
                'name.required'  => 'Please input name',
                'brand_image.min' => 'Please insert brand image'
            ]
        );
        $brand_image = $request->file('brand_image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'images/brand/'; //folder for store image in public image/brand
        $last_img = $up_location . $img_name;
        $brand_image->move($up_location, $img_name);

        // $name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        // Image::make($brand_image)->resize(300,200)->save('image/brand'.$name_gen);
        // $last_img = 'image/'.brand$name_gen;

        Brand::insert([
            'name' => $request->name,
            'brand_image' => $last_img,
            'created_at'  => Carbon::now(),
        ]);
        return Redirect()->back()->with('success', 'Brand inserted successfully');
    }
    public function edit($id) {
        $brand = Brand::find($id);
        return view('admin.products.brands.edit', compact('brand'));
    }
    public function update(Request $request,$id) {
        $validateData = $request->validate(
            [
                'name'  => 'required|unique:brands|min:4',
                'brand_image'  => 'required|mimes:jpg,jpeg,png',
            ],
            [
                'name.required'  => 'Please input name',
                'brand_image.min' => 'Please insert brand image'
            ]
        );
        // $old_image = $request->old_image;
        $brand_image = $request->file('brand_image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'images/brand/'; //folder for store image in public image/brand
        $last_img = $up_location . $img_name;
        $brand_image->move($up_location, $img_name);
        // unlink($old_image);
        Brand::find($id)->update([
            'name' => $request->name,
            'brand_image' => $last_img,
            'created_at'  => Carbon::now(),
        ]);
        return redirect()->route('brand.list')->with('success', 'Record has been updated successfully');
    }
    public function destroy($id) {
        $brand = Brand::where('id', $id);
        $brand->delete();
        return redirect()->route('brand.list')->with('success', 'Record has been deleted successfully');
    }
}

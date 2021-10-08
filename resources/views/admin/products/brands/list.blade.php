@extends('admin.admin_master')
@section('content')
    <div class="main-content container-fluid">
        <div class="card">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card-header">
                <h4><a href="{{ route('brand.form') }}" class="btn btn-success" style="float: right"><i
                            class="fa fa-plus-circle"></i> Add new</a></h4>
                <div class="card-header-form">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th class="text-center">
                                    <div class="custom-checkbox custom-checkbox-table custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                                            class="custom-control-input" id="checkbox-all">
                                        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Name</th>
                                <th>Images</th>
                                <th>Authors</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($list as $lists)
                                <tr>
                                    <td class="p-0 text-center">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                                                id="checkbox-1">
                                            <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td>{{ $lists->name }}</td>
                                    <td>
                                        <div class="view" style="position: relative;">
                                            <img src="{{ asset($lists->brand_image) }}"
                                                style="width: 120px;height: 120px;" id="img">
                                        </div>
                                    </td>
                                    </td>
                                    <td>User 1</td>
                                    <td>{{ Carbon\Carbon::parse($lists->created_at)->diffForHumans() }}</td>
                                    <td>
                                        <div class="badge badge-success">Completed</div>
                                    </td>
                                    <td>
                                        <a href="{{ route('brand.edit', $lists->id) }}"><i class="fa fa-pen mr-2"
                                                style="color: rgb(210, 224, 11);font-size: 18px"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#ModalDestroy{{$lists->id}}"><i
                                                class="fa fa-trash" style="color: red;font-size: 18px"></i></a>
                                    </td>
                                </tr>
                                @include('admin.products.brands.destory')
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{$lists->links()}} --}}
                </div>
            </div>
        </div>
    @endsection

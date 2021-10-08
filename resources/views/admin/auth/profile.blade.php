@extends('admin.admin_master')
@section('content')
    <div class="main-content container-fluid ">
        <h1>My profile</h1>
        <div class="row shadow p-3 mb-5 bg-body rounded">
            <div class="col-md-1" style="float: left"></div>
            <div class="col-md-4" style="float: left">
                <img alt="image" style="width: 150px;height: 150px;" src="assets/img/users/user-1.png"
                    class="rounded-circle author-box-picture">
            </div>
            <div class="col-md-1" style="float: left"></div>
            <div class="col-md-5 bg-red-800" style="float: left">
                <div class="author-box-description">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur voluptatum alias molestias
                        minus quod dignissimos.
                    </p>
                </div>
                <div class="w-100 d-sm-none"></div>
            </div>
            <div class="col-md-1">
                 <button class="btn btn-primary">Change</button>
            </div>
        </div>
    </div>
@endsection

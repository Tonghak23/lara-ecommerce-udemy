@extends('admin.admin_master')
@section('content')
    <div class="main-content container-fluid">
        <div class="card">
            <div class="row">
                <div class="col-md-12">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data"
                        class="needs-validation">
                        @csrf
                        <div class="card-header">
                            <h4>Form Create brand</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" required="" name="name">
                            </div>
                            <label for="profile">
                                <img id="blah"
                                    src="https://png.pngtree.com/png-clipart/20190916/original/pngtree-cartoon-camera-icon-download-png-image_4597179.jpg"
                                    alt="" style="width: 120px; height: 120px">
                            </label>
                            <input type="file" name="brand_image"
                                style="width: 120px; height: 120px;
                                        background-position: center;background-repeat: no-repeat;background-size: cover;display: none" id="profile"
                                placeholder="" class="form-control">
                            <div class="invalid-feedback">
                                Please chose profile.
                            </div>

                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function loadImg() {}
        (function() {
            "use strict";
            window.addEventListener(
                "load",
                function() {
                    var forms = document.getElementsByClassName("needs-validation");
                    var validation = Array.prototype.filter.call(
                        forms,
                        function(form) {
                            form.addEventListener(
                                "submit",
                                function(event) {
                                    if (form.checkValidity() === false) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                    }
                                    form.classList.add("was-validated");
                                },
                                false
                            );
                        }
                    );
                },
                false
            );
        })();
        $(document).ready(function() {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#profile").change(function() {
                readURL(this);
            });
        });
    </script>
@endsection

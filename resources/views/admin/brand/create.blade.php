@extends('admin.inc.App')
@section('title', 'Add Brand')

@section('main-content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="ibox-title">
                        <h5>Add Brand</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="POST"  action="{{ route('staff.brands.store') }}" class="brand-create-form"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Images</label>
                                <div class="col-sm-10">
                                    <div class="icon-banner-box row">
                                        <div class="col-sm-6">
                                            <div class="form-group brand-photo mb-0">
                                                <label for="icon">Icon</label>
                                                <input type="file" id="icon" name="icon">
                                            </div>
                                            <div class="form-group brand-photo">
                                                <img width="80px;" id="icon"
                                                     onchange="document.getElementById('icon').src = window.URL.createObjectURL(this.files[0])"
                                                     src="" alt="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group brand-photo mb-0">
                                                <label for="image">Image</label>
                                                <input type="file" id="image" name="image">
                                            </div>
                                            <div class="form-group brand-photo">
                                                <img width="80px;" id="banner"
                                                     onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                                                     src="" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="active" name="status" value="active">
                                    <label for="active">Active</label>

                                    <input type="radio" id="inactive" name="status" value="inactive">
                                    <label for="inactive">Inactive</label>-
                                </div>
                            </div>
                            <div class="form-group row text-right">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary px-5"><i class="icon-user"></i> Add Brand </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--amar sonar bangla--}}
@endsection

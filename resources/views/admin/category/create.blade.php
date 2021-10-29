@extends('admin.inc.App')
@section('title', 'Add Category')

@section('main-content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="ibox-title">
                        <h5>Add Category</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="POST"  action="{{ route('staff.categories.store') }}" class="category-create-form"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="root">Root Categories</label>
                                <div class="col-sm-10">
                                    <select class="select2_demo_1 form-control" tabindex="-1" aria-hidden="true" name="root">
                                        {!! category_options($categories) !!}
                                    </select>
                                </div>
                            </div>
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
                                                <label for="image">Icon</label>
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
                                                <label for="image">Banner</label>
                                                <input type="file" id="banner" name="banner">
                                            </div>
                                            <div class="form-group brand-photo">
                                                <img width="80px;" id="banner"
                                                     onchange="document.getElementById('banner').src = window.URL.createObjectURL(this.files[0])"
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
                                    <label for="inactive">Inactive</label>
                                </div>
                            </div>
                            <div class="form-group row text-right">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary px-5"><i class="icon-user"></i> Add Category </button>
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

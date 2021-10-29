@extends('admin.inc.App')
@section('title', 'Add Product')

@section('main-content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="ibox-title">
                        <h5>Add Product</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="POST"  action="{{ route('staff.products.store') }}" class="product-create-form"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="root">Categories</label>
                                <div class="col-sm-10">
                                    <select class="select2_demo_1 form-control" tabindex="-1" aria-hidden="true" name="root">
                                        {!! category_options($categories) !!}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="root">Brands</label>
                                <div class="col-sm-10">
                                    <select class="select2_demo_1 form-control" tabindex="-1" aria-hidden="true" name="root">
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Model</label>
                                <div class="col-sm-10">
                                    <input type="text" name="model" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Prices</label>
                                <div class="col-sm-10">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label" for="price">Regular Price</label>
                                                <div class="col-sm-8">
                                                    <input type="number" name="price" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label" for="offer_price">Offer Price</label>
                                                <div class="col-sm-8">
                                                    <input type="number" name="offer_price" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Dates</label>
                                <div class="col-sm-10">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label" for="offer_date_start">Offer Start Date</label>
                                                <div class="col-sm-8" id="data_1">
                                                    <div class="input-group date">
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                        <input type="text" class="form-control" name="offer_date_start" value="03/04/2014">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label" for="offer_date_end">Offer End Date</label>
                                                <div class="col-sm-8">
                                                    <div class="input-group date">
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                        <input type="text" class="form-control" name="offer_date_end" value="03/04/2014">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Prices</label>
                                <div class="col-sm-10">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label" for="price">Regular Price</label>
                                                <div class="col-sm-8">
                                                    <input type="number" name="price" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label" for="offer_price">Offer Price</label>
                                                <div class="col-sm-8">
                                                    <input type="number" name="offer_price" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="text" name="model" class="form-control">
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
                                <label class="col-sm-2 col-form-label" class="col-sm-2 col-form-label">Featured Product?</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="yes" name="featured" value="yes">
                                    <label for="yes">Yes</label>

                                    <input type="radio" id="no" name="featured" value="no">
                                    <label for="no">No</label>
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
                                    <button type="submit" class="btn btn-primary px-5"><i class="icon-user"></i> Add Product </button>
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

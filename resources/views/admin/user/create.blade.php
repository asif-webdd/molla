@extends('admin.inc.App')
@section('title', 'Add User')

@section('main-content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="ibox-title">
                        <h5>Add User</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="POST"  action="{{ route('staff.users.register') }}" class="create-form"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-10">
                                    <input type="text" name="role" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password"
                                           placeholder="Enter Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password_confirmation"
                                           placeholder="Enter Password">
                                </div>
                            </div>
                            <div class="form-group row user-photo mb-0">
                                <label class="col-sm-2 col-form-label" for="image">Photo Upload</label>
                                <div class="col-sm-10">
                                    <input type="file" id="image" name="image">
                                </div>
                            </div>
                            <div class="form-group user-photo">
                                <img width="80px;" id="UserImg" src=""
                                     onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                                     alt="">
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
                                    <button type="submit" class="btn btn-primary px-5"><i class="icon-user"></i> Add User </button>
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

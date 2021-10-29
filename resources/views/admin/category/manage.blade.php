@extends('admin.inc.App')
@section('title', 'Manage Categories')

@section('main-content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Manage Categories</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#" class="dropdown-item">Config option 1</a>
                                </li>
                                <li><a href="#" class="dropdown-item">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Icon</th>
                                    <th>Banner</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $category)
                                    <tr class="gradeA">
                                        <td>{{ $category->name }}</td>
                                        <td><img width="50px;" src="{{ asset('categories/' . ($category->icon ?? 'demo-brand.png')) }}" alt="Category"></td>
                                        <td><img width="50px;" src="{{ asset('categories/' . ($category->banner ?? 'demo-brand.png')) }}" alt="Category"></td>
                                        <td class="center">Active</td>
                                        <td class="center">
                                            <button class="btn btn-primary btn-circle" type="button"><i class="fa fa-eye"></i>
                                            </button>
                                            <button class="btn btn-success btn-circle" type="button"><i class="fa fa-pencil"></i>
                                            </button>
                                            <button class="btn btn-danger btn-circle" type="button"><i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Photo</th>
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

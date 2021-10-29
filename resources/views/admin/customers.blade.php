@extends('admin.inc.App')
@section('title', 'Manage Users')

@section('main-content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="ibox-content m-b-sm border-bottom">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="col-form-label" for="search-content">Name</label>
                        <input type="text" id="customer-name-search-content" name="name" value="" placeholder="name"
                               class="form-control">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="col-form-label" for="price">Email</label>
                        <input type="text" id="customer-email-search-content" name="email" value="" placeholder="email" class="form-control">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="col-form-label" for="quantity">Mobile</label>
                        <input type="text" id="customer-mobile-search-content" name="mobile" value="" placeholder="mobile"
                               class="form-control">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="col-form-label" for="quantity">Address</label>
                        <input type="text" id="customer-address-search-content" name="address" value="" placeholder="address"
                               class="form-control">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="col-form-label">Show</label>
                        <select class="form-control form-control-sm" id="limit">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Customers</h5>
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
                            <table class="table table-striped table-bordered table-hover dataTables-example"
                                   data-page-size="15">
                                <thead>
                                <tr>

                                    <th data-toggle="true"
                                        class="footable-visible footable-first-column footable-sortable footable-sorted">
                                        SL<span class="footable-sort-indicator"></span></th>
                                    <th data-toggle="true"
                                        class="footable-visible footable-first-column footable-sortable footable-sorted">
                                        Customer Name<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone" class="footable-visible footable-sortable">Email<span
                                            class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone" class="footable-visible footable-sortable">Mobile<span
                                            class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone,tablet" class="footable-visible footable-sortable">
                                        Address<span class="footable-sort-indicator"></span></th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($customers as $customer)
                                    <tr class="footable-even" style="">
                                        <td class="footable-visible footable-first-column"><span
                                                class="footable-toggle"></span>
                                            {{ $loop->index + $customers->firstItem() }}
                                        </td>
                                        <td class="footable-visible footable-first-column"><span
                                                class="footable-toggle"></span>
                                            {{ $customer->name }}
                                        </td>
                                        <td class="footable-visible">
                                            {{ $customer->email }}
                                        </td>
                                        <td class="footable-visible">
                                            {{ $customer->mobile }}
                                        </td>
                                        <td class="footable-visible">
                                            {{ $customer->address }}
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                {{ $customers->links() }}
                                </tfoot>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@extends('frontend.inc.App')

@section('main-content')



    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Checkout<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <nav aria-label="breadcrumb" class="breadcrumb-nav">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </div><!-- End .container -->
                </nav><!-- End .breadcrumb-nav -->

                <div class="page-content">
                    <div class="checkout">
                        <div class="container">
                            <div class="checkout-discount">
                                <form action="#">
                                    <input type="text" class="form-control" required="" id="checkout-discount-input">
                                    <label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to enter your code</span></label>
                                </form>
                            </div><!-- End .checkout-discount -->
                            <form action="{{ route('customer.checkout') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-9">
                                        <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>First Name *</label>
                                                <input type="text" class="form-control" name="firstName" required="">
                                            </div><!-- End .col-sm-6 -->

                                            <div class="col-sm-6">
                                                <label>Last Name *</label>
                                                <input type="text" class="form-control" name="lastName" required="">
                                            </div><!-- End .col-sm-6 -->
                                        </div><!-- End .row -->

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Country *</label>
                                                <input type="text" class="form-control" name="country"
                                                       placeholder="House number and Street name"
                                                       required="">
                                            </div><!-- End .col-sm-6 -->

                                            <div class="col-sm-6">
                                                <label>Phone *</label>
                                                <input type="tel" class="form-control" name="phone" required="">
                                            </div><!-- End .col-sm-6 -->
                                        </div><!-- End .row -->

                                        <label>Address *</label>
                                        <input type="text" class="form-control" name="address"
                                               placeholder="House number and Street name"
                                               required="">


                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="checkout-create-acc">
                                            <label class="custom-control-label" for="checkout-create-acc">Create an
                                                account?</label>
                                        </div><!-- End .custom-checkbox -->

                                        {{--<div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkout-diff-address">
                                            <label class="custom-control-label" for="checkout-diff-address" >Ship to a different
                                                address?</label>
                                        </div><!-- End .custom-checkbox -->--}}

                                        <div class="card-header" id="heading-3">
                                            <h2 class="card-title">
                                                <a class="collapsed" role="button" data-toggle="collapse"
                                                   href="#collapse-10" aria-expanded="true" aria-controls="collapse-10">
                                                    Ship to a different address?
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-10" class="collapse" aria-labelledby="heading-10"
                                             data-parent="#accordion-payment">
                                            <div class="card-body">
                                                <form action="">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <label>First Name *</label>
                                                            <input type="text" class="form-control"
                                                                   name="ship_firstName">
                                                        </div><!-- End .col-sm-6 -->
                                                        <div class="col-sm-6">
                                                            <label>Last Name *</label>
                                                            <input type="text" class="form-control"
                                                                   name="ship_lastName">
                                                        </div><!-- End .col-sm-6 -->
                                                    </div><!-- End .col-sm-6 -->

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <label>Country *</label>
                                                            <input type="text" class="form-control" name="ship_country"
                                                                   placeholder="House number and Street name">
                                                        </div><!-- End .col-sm-6 -->

                                                        <div class="col-sm-6">
                                                            <label>Phone *</label>
                                                            <input type="tel" class="form-control" name="ship_phone">
                                                        </div><!-- End .col-sm-6 -->
                                                    </div><!-- End .row -->

                                                    <label>Address *</label>
                                                    <input type="text" class="form-control" name="ship_address"
                                                           placeholder="House number and Street name">
                                                </form>
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->

                                    </div><!-- End .col-lg-9 -->

                                    <aside class="col-lg-3">
                                        <div class="summary">
                                            <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                            <table class="table table-summary">
                                                <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Total</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @foreach(Cart::getContent() as $item)
                                                    <tr>
                                                        <td><a>{{ $item->name }}</a></td>
                                                        <td>&#2547; {{ $item->price }}</td>
                                                    </tr>
                                                @endforeach
                                                <tr class="summary-subtotal">
                                                    <td>Subtotal:</td>
                                                    <td>&#2547; {{ Cart::getSubTotal() }}</td>
                                                </tr><!-- End .summary-subtotal -->
                                                <tr>
                                                    <td>Shipping:</td>
                                                    <td>Free shipping</td>
                                                </tr>
                                                <tr class="summary-total">
                                                    <td>Total:</td>
                                                    <td>&#2547; {{ Cart::getTotal() }}</td>
                                                </tr><!-- End .summary-total -->
                                                </tbody>
                                            </table><!-- End .table table-summary -->

                                            <div class="accordion-summary" id="accordion-payment">
                                                <label for="#cash-on-delivery"><input type="radio" id="cash-on-delivery" name="cashOnDelivery"> Cash on delivery</label>

                                                <label for="#online-payment"><input type="radio" id="online-payment" name="onlinePayment"> Online payment</label>
                                            </div><!-- End .card -->

                                            <button type="submit"
                                                    class="btn btn-outline-primary-2 btn-order btn-block my-5">
                                                <span class="btn-text">Place Order</span>
                                                <span class="btn-hover-text">Proceed to Checkout</span>
                                            </button>
                                        </div><!-- End .summary -->
                                    </aside><!-- End .col-lg-3 -->
                                </div><!-- End .row -->
                            </form>
                        </div><!-- End .container -->
                    </div><!-- End .checkout -->
                </div><!-- End .page-content -->
            </div>
        </div>
    </div>


@endsection

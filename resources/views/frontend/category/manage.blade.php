@extends('frontend.inc.App')

@section('main-content')

    <div class="page-header text-center"
         style="background-image: url('assets/frontend/images/page-header-bg.jpg'); margin-top: -20px;">
        <div class="container">
            <h1 class="page-title">{{ $category->name }}<span>{{ $root_category->name }}</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">{{ $root_category->name }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
                        </ol>
                    </div><!-- End .container -->
                </nav><!-- End .breadcrumb-nav -->

                <div class="page-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="toolbox">
                                    <div class="toolbox-left">
                                        <div class="toolbox-info">
                                            Showing <span>9 of 56</span> Products
                                        </div><!-- End .toolbox-info -->
                                    </div><!-- End .toolbox-left -->

                                    <div class="toolbox-right">
                                        <div class="toolbox-sort">
                                            <label for="sortby">Show:</label>
                                            <div class="select-custom" style="margin-right: 10px;">
                                                <select class="form-control product-limit">
                                                    <option value="9" selected="selected">9</option>
                                                    <option value="15">15</option>
                                                    <option value="24">24</option>
                                                    <option value="30">30</option>
                                                </select>
                                            </div>
                                            <label for="sortby">Sort by:</label>
                                            <div class="select-custom">
                                                <select class="form-control sortby">
                                                    <option value="default" selected="selected">Default</option>
                                                    <option value="latest">Latest</option>
                                                    <option value="rating">Most Rated</option>
                                                    <option value="price_l_to_h">Price Low to High</option>
                                                    <option value="price_h_to_l">Price High to Low</option>
                                                </select>
                                            </div>
                                        </div><!-- End .toolbox-sort -->
                                        <div class="toolbox-layout">
                                            <a href="category-list.html" class="btn-layout">
                                                <svg width="16" height="10">
                                                    <rect x="0" y="0" width="4" height="4"/>
                                                    <rect x="6" y="0" width="10" height="4"/>
                                                    <rect x="0" y="6" width="4" height="4"/>
                                                    <rect x="6" y="6" width="10" height="4"/>
                                                </svg>
                                            </a>

                                            <a href="category.html" class="btn-layout active">
                                                <svg width="16" height="10">
                                                    <rect x="0" y="0" width="4" height="4"/>
                                                    <rect x="6" y="0" width="4" height="4"/>
                                                    <rect x="12" y="0" width="4" height="4"/>
                                                    <rect x="0" y="6" width="4" height="4"/>
                                                    <rect x="6" y="6" width="4" height="4"/>
                                                    <rect x="12" y="6" width="4" height="4"/>
                                                </svg>
                                            </a>

                                            <a href="category-4cols.html" class="btn-layout">
                                                <svg width="22" height="10">
                                                    <rect x="0" y="0" width="4" height="4"/>
                                                    <rect x="6" y="0" width="4" height="4"/>
                                                    <rect x="12" y="0" width="4" height="4"/>
                                                    <rect x="18" y="0" width="4" height="4"/>
                                                    <rect x="0" y="6" width="4" height="4"/>
                                                    <rect x="6" y="6" width="4" height="4"/>
                                                    <rect x="12" y="6" width="4" height="4"/>
                                                    <rect x="18" y="6" width="4" height="4"/>
                                                </svg>
                                            </a>
                                        </div><!-- End .toolbox-layout -->
                                    </div><!-- End .toolbox-right -->
                                </div><!-- End .toolbox -->

                                <div class="products mb-3"
                                     data-url="{{ route('cat.products', [$root_category->slug, $category->slug]) }}">
                                    <div class="row justify-content-center frontend-products">
                                        @include('frontend.category.products')
                                    </div><!-- End .row -->
                                </div><!-- End .products -->

                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item disabled">
                                            <a class="page-link page-link-prev" href="#" aria-label="Previous"
                                               tabindex="-1"
                                               aria-disabled="true">
                                                <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                            </a>
                                        </li>
                                        <li class="page-item active" aria-current="page"><a class="page-link"
                                                                                            href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item-total">of 6</li>
                                        <li class="page-item">
                                            <a class="page-link page-link-next" href="#" aria-label="Next">
                                                Next <span aria-hidden="true"><i
                                                        class="icon-long-arrow-right"></i></span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div><!-- End .col-lg-9 -->
                            <aside class="col-lg-3 order-lg-first">
                                <div class="sidebar sidebar-shop">
                                    <div class="widget widget-clean">
                                        <label>Filters:</label>
                                        <a href="#" class="sidebar-filter-clear">Clean All</a>
                                    </div><!-- End .widget widget-clean -->

                                    <div class="widget widget-collapsible">
                                        <h3 class="widget-title">
                                            <a data-toggle="collapse" href="#widget-1" role="button"
                                               aria-expanded="true"
                                               aria-controls="widget-1">
                                                Category
                                            </a>
                                        </h3><!-- End .widget-title -->

                                        <div class="collapse show" id="widget-1">
                                            <div class="widget-body">
                                                <div class="filter-items filter-items-count filter-categorywise">
                                                    @foreach($categories as $category)
                                                        <div class="filter-item">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox"
                                                                       class="custom-control-input category-single-item"
                                                                       id="{{ $category->id }}"
                                                                       value="{{ $category->id }}">
                                                                <label class="custom-control-label"
                                                                       for="{{ $category->id }}">{{ $category->name }}</label>
                                                            </div><!-- End .custom-checkbox -->
                                                            <span
                                                                class="item-count">{{ $category->products->count() }}</span>
                                                        </div><!-- End .filter-item -->
                                                    @endforeach
                                                </div><!-- End .filter-items -->
                                            </div><!-- End .widget-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .widget -->

                                    <div class="widget widget-collapsible">
                                        <h3 class="widget-title">
                                            <a data-toggle="collapse" href="#widget-2" role="button"
                                               aria-expanded="true"
                                               aria-controls="widget-2">
                                                Size
                                            </a>
                                        </h3><!-- End .widget-title -->

                                        <div class="collapse show" id="widget-2">
                                            <div class="widget-body">
                                                <div class="filter-items">
                                                    <div class="filter-item">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                   id="size-1">
                                                            <label class="custom-control-label" for="size-1">XS</label>
                                                        </div><!-- End .custom-checkbox -->
                                                    </div><!-- End .filter-item -->

                                                    <div class="filter-item">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                   id="size-2">
                                                            <label class="custom-control-label" for="size-2">S</label>
                                                        </div><!-- End .custom-checkbox -->
                                                    </div><!-- End .filter-item -->

                                                    <div class="filter-item">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" checked
                                                                   id="size-3">
                                                            <label class="custom-control-label" for="size-3">M</label>
                                                        </div><!-- End .custom-checkbox -->
                                                    </div><!-- End .filter-item -->

                                                    <div class="filter-item">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" checked
                                                                   id="size-4">
                                                            <label class="custom-control-label" for="size-4">L</label>
                                                        </div><!-- End .custom-checkbox -->
                                                    </div><!-- End .filter-item -->

                                                    <div class="filter-item">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                   id="size-5">
                                                            <label class="custom-control-label" for="size-5">XL</label>
                                                        </div><!-- End .custom-checkbox -->
                                                    </div><!-- End .filter-item -->

                                                    <div class="filter-item">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                   id="size-6">
                                                            <label class="custom-control-label" for="size-6">XXL</label>
                                                        </div><!-- End .custom-checkbox -->
                                                    </div><!-- End .filter-item -->
                                                </div><!-- End .filter-items -->
                                            </div><!-- End .widget-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .widget -->

                                    <div class="widget widget-collapsible">
                                        <h3 class="widget-title">
                                            <a data-toggle="collapse" href="#widget-3" role="button"
                                               aria-expanded="true"
                                               aria-controls="widget-3">
                                                Colour
                                            </a>
                                        </h3><!-- End .widget-title -->

                                        <div class="collapse show" id="widget-3">
                                            <div class="widget-body">
                                                <div class="filter-colors">
                                                    <a href="#" style="background: #b87145;"><span class="sr-only">Color Name</span></a>
                                                    <a href="#" style="background: #f0c04a;"><span class="sr-only">Color Name</span></a>
                                                    <a href="#" style="background: #333333;"><span class="sr-only">Color Name</span></a>
                                                    <a href="#" class="selected" style="background: #cc3333;"><span
                                                            class="sr-only">Color Name</span></a>
                                                    <a href="#" style="background: #3399cc;"><span class="sr-only">Color Name</span></a>
                                                    <a href="#" style="background: #669933;"><span class="sr-only">Color Name</span></a>
                                                    <a href="#" style="background: #f2719c;"><span class="sr-only">Color Name</span></a>
                                                    <a href="#" style="background: #ebebeb;"><span class="sr-only">Color Name</span></a>
                                                </div><!-- End .filter-colors -->
                                            </div><!-- End .widget-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .widget -->

                                    <div class="widget widget-collapsible">
                                        <h3 class="widget-title">
                                            <a data-toggle="collapse" href="#widget-4" role="button"
                                               aria-expanded="true"
                                               aria-controls="widget-4">
                                                Brand
                                            </a>
                                        </h3><!-- End .widget-title -->

                                        <div class="collapse show" id="widget-4">
                                            <div class="widget-body">
                                                <div class="filter-items filter-brandwise" id="filter-brandwise">
                                                    @foreach($brands as $brand)
                                                        <div class="filter-item">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input brand-single-item" value="{{ $brand->id }}" id="{{ $brand->slug }}">
                                                                <label class="custom-control-label" for="{{ $brand->slug }}">{{ $brand->name }}</label>
                                                            </div><!-- End .custom-checkbox -->
                                                        </div><!-- End .filter-item -->
                                                    @endforeach
                                                </div><!-- End .filter-items -->
                                            </div><!-- End .widget-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .widget -->

                                    <div class="widget widget-collapsible">
                                        <h3 class="widget-title">
                                            <a data-toggle="collapse" href="#widget-5" role="button"
                                               aria-expanded="true"
                                               aria-controls="widget-5">
                                                Price
                                            </a>
                                        </h3><!-- End .widget-title -->

                                        <div class="collapse show" id="widget-5">
                                            <div class="widget-body">
                                                <div class="filter-price">
                                                    <div class="filter-price-text">
                                                        Price Range:
                                                        <span id="filter-price-range"></span>
                                                    </div><!-- End .filter-price-text -->

                                                    <div id="price-slider">

                                                    </div><!-- End #price-slider -->
                                                </div><!-- End .filter-price -->
                                            </div><!-- End .widget-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .widget -->
                                </div><!-- End .sidebar sidebar-shop -->
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .page-content -->
            </div>
        </div>
    </div>

@endsection

@section('CSS')
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/nouislider.css') }}">
@endsection
@section('JS')
    <script src="{{ asset('assets/frontend/js/wNumb.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/nouislider.min.js') }}"></script>
@endsection

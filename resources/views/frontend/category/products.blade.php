@if($data->isEmpty())
    <h2>Product not pound!</h2>
@endif


@foreach($data as $product)
    <div class="col-6 col-md-4 col-lg-4">
        <div class="product product-7 text-center">
            <figure class="product-media">
                <span class="product-label label-new">New</span>
                <a href="{{ route('product', $product->slug) }}">
                    <img src="{{ $product->thumbnail }}" alt="Product image"
                         class="product-image">
                </a>

                <div class="product-action-vertical">
                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                       title="Quick view"><span>Quick view</span></a>
                    <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                </div><!-- End .product-action-vertical -->

                <div class="product-action">
                    <a href="{{ route('cart.store') }}" data-slug="{{ $product->slug }}" class="btn-product btn-cart add-cart-btn" title="Add to cart"><span>add to cart</span></a>
                </div><!-- End .product-action -->
            </figure><!-- End .product-media -->

            <div class="product-body">
                <div class="product-cat">
                    <a href="#">{{ $product->category->name }}</a>
                </div><!-- End .product-cat -->
                <h3 class="product-title"><a href="{{ route('product', $product->slug) }}">{{ $product->name }}</a></h3><!-- End .product-title -->
                <div class="product-price">
                    &#2547; {{ $product->price }}
                </div><!-- End .product-price -->
                <div class="ratings-container">
                    <div class="ratings">
                        <div class="ratings-val" style="width: 20%;"></div>
                        <!-- End .ratings-val -->
                    </div><!-- End .ratings -->
                    <span class="ratings-text">( 2 Reviews )</span>
                </div><!-- End .rating-container -->

                <div class="product-nav product-nav-thumbs">
                    @foreach(json_decode($product->gallery) as $images)
                        <a href="#" class="">
                            <img src="{{ $images }}"
                                 alt="product desc">
                        </a>
                    @endforeach
                </div><!-- End .product-nav -->
            </div><!-- End .product-body -->
        </div><!-- End .product -->
    </div><!-- End .col-sm-6 col-lg-4 -->
@endforeach

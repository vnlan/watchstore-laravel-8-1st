@extends('watch-shop.layouts.shop-layout')

@section('shop-content')
<div class="page-wrapper">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Grid 4 Columns<span>Shop</span></h1>
        </div><!-- End .container -->
    </div>


<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="toolbox">
                    <div class="toolbox-left">
                        <div class="toolbox-info">
                            Showing <span>12 of 56</span> Products
                        </div><!-- End .toolbox-info -->
                    </div><!-- End .toolbox-left -->

                    <div class="toolbox-right">
                        <div class="toolbox-sort">
                            <label for="sortby">Sort by:</label>
                            <div class="select-custom">
                                <select name="sortby" id="sortby" class="form-control">
                                    <option value="popularity" selected="selected">Most Popular</option>
                                    <option value="rating">Most Rated</option>
                                    <option value="date">Date</option>
                                </select>
                            </div>
                        </div><!-- End .toolbox-sort -->
                        <div class="toolbox-layout">
                            <a href="category-list.html" class="btn-layout">
                                <svg width="16" height="10">
                                    <rect x="0" y="0" width="4" height="4"></rect>
                                    <rect x="6" y="0" width="10" height="4"></rect>
                                    <rect x="0" y="6" width="4" height="4"></rect>
                                    <rect x="6" y="6" width="10" height="4"></rect>
                                </svg>
                            </a>

                            <a href="category-2cols.html" class="btn-layout">
                                <svg width="10" height="10">
                                    <rect x="0" y="0" width="4" height="4"></rect>
                                    <rect x="6" y="0" width="4" height="4"></rect>
                                    <rect x="0" y="6" width="4" height="4"></rect>
                                    <rect x="6" y="6" width="4" height="4"></rect>
                                </svg>
                            </a>

                            <a href="category.html" class="btn-layout">
                                <svg width="16" height="10">
                                    <rect x="0" y="0" width="4" height="4"></rect>
                                    <rect x="6" y="0" width="4" height="4"></rect>
                                    <rect x="12" y="0" width="4" height="4"></rect>
                                    <rect x="0" y="6" width="4" height="4"></rect>
                                    <rect x="6" y="6" width="4" height="4"></rect>
                                    <rect x="12" y="6" width="4" height="4"></rect>
                                </svg>
                            </a>

                            <a href="category-4cols.html" class="btn-layout active">
                                <svg width="22" height="10">
                                    <rect x="0" y="0" width="4" height="4"></rect>
                                    <rect x="6" y="0" width="4" height="4"></rect>
                                    <rect x="12" y="0" width="4" height="4"></rect>
                                    <rect x="18" y="0" width="4" height="4"></rect>
                                    <rect x="0" y="6" width="4" height="4"></rect>
                                    <rect x="6" y="6" width="4" height="4"></rect>
                                    <rect x="12" y="6" width="4" height="4"></rect>
                                    <rect x="18" y="6" width="4" height="4"></rect>
                                </svg>
                            </a>
                        </div><!-- End .toolbox-layout -->
                    </div><!-- End .toolbox-right -->
                </div><!-- End .toolbox -->

                <div class="products mb-3">
                    <div class="row justify-content-center">
                        @foreach($products as $product)
                        <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                            <div class="product product-7 text-center">
                                <figure class="product-media">
                                    <span class="product-label label-new">New</span>
                                    <a href="product.html">
                                        <img src="{{ $product->feature_image_path }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                        <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">{{ $product->categories->name }}</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="">{{$product->name}}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        {{number_format($product->price)}} VNĐ
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 2 Reviews )</span>
                                    </div><!-- End .rating-container -->

                                    <div class="product-nav product-nav-thumbs">
                                        @foreach($product->images as $img)
                                        <a href="#" class="active">
                                            <img src="{{$img->image_path}}" alt="product desc">
                                        </a>
                                        @endforeach
                                    </div><!-- End .product-nav -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                        @endforeach
                    </div><!-- End .row -->
                </div><!-- End .products -->


                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                            </a>
                        </li>
                        <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item-total">of 6</li>
                        <li class="page-item">
                            <a class="page-link page-link-next" href="#" aria-label="Next">
                                Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
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
                            <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                Category
                            </a>
                        </h3><!-- End .widget-title -->

                        <div class="collapse show" id="widget-1">
                            <div class="widget-body">
                                <div class="filter-items filter-items-count">
    
                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cat-1">
                                            <label class="custom-control-label" for="cat-1">cate 1</label>
                                            <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1"></a>
                                            
                                        </div><!-- End .custom-checkbox -->
                                        {{-- <span class="item-count"></span> --}}
                                    </div><!-- End .filter-item -->

                                    
    
 
                                </div><!-- End .filter-items -->
                            </div><!-- End .widget-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .widget -->

                    

                    <div class="widget widget-collapsible">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true" aria-controls="widget-3">
                                Colour
                            </a>
                        </h3><!-- End .widget-title -->

                        <div class="collapse show" id="widget-3">
                            <div class="widget-body">
                                <div class="filter-colors">
                                    <a href="#" style="background: #b87145;"><span class="sr-only">Color Name</span></a>
                                    <a href="#" style="background: #f0c04a;"><span class="sr-only">Color Name</span></a>
                                    <a href="#" style="background: #333333;"><span class="sr-only">Color Name</span></a>
                                    <a href="#" class="selected" style="background: #cc3333;"><span class="sr-only">Color Name</span></a>
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
                            <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
                                Brand
                            </a>
                        </h3><!-- End .widget-title -->

                        <div class="collapse show" id="widget-4">
                            <div class="widget-body">
                                <div class="filter-items">
    @foreach($brands as $brand)
    <div class="filter-item">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="brand-1">
            <div class="row">
            <img src="{{$brand->logo_image_path}}" style="width: 30px; height: 30px;">
            <label class="custom-control-label" for="brand-1">{{ $brand->company_short_name }}</label>
            </div>
        </div><!-- End .custom-checkbox -->
    </div><!-- End .filter-item -->
    @endforeach
                                    
                                </div><!-- End .filter-items -->
                            </div><!-- End .widget-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .widget -->

                    <div class="widget widget-collapsible">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
                                Price
                            </a>
                        </h3><!-- End .widget-title -->

                        <div class="collapse show" id="widget-5">
                            <div class="widget-body">
                                <div class="filter-price">
                                    <div class="filter-price-text">
                                        Price Range:
                                        <span id="filter-price-range">$0 - $750</span>
                                    </div><!-- End .filter-price-text -->

                                    <div id="price-slider" class="noUi-target noUi-ltr noUi-horizontal"><div class="noUi-base"><div class="noUi-connects"><div class="noUi-connect" style="transform: translate(0%, 0px) scale(0.75, 1);"></div></div><div class="noUi-origin" style="transform: translate(-100%, 0px); z-index: 5;"><div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="550.0" aria-valuenow="0.0" aria-valuetext="$0"><div class="noUi-touch-area"></div><div class="noUi-tooltip">$0</div></div></div><div class="noUi-origin" style="transform: translate(-25%, 0px); z-index: 4;"><div class="noUi-handle noUi-handle-upper" data-handle="1" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="200.0" aria-valuemax="1000.0" aria-valuenow="750.0" aria-valuetext="$750"><div class="noUi-touch-area"></div><div class="noUi-tooltip">$750</div></div></div></div></div><!-- End #price-slider -->
                                </div><!-- End .filter-price -->
                            </div><!-- End .widget-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .widget -->
                </div><!-- End .sidebar sidebar-shop -->
            </aside><!-- End .col-lg-3 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div>
</div>

@endsection()
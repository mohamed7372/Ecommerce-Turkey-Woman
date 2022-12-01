@extends('frontend.layouts.app')

@if (isset($category_id))
    @php
        $meta_title = \App\Models\Category::find($category_id)->meta_title;
        $meta_description = \App\Models\Category::find($category_id)->meta_description;
    @endphp
@elseif (isset($brand_id))
    @php
        $meta_title = \App\Models\Brand::find($brand_id)->meta_title;
        $meta_description = \App\Models\Brand::find($brand_id)->meta_description;
    @endphp
@else
    @php
        $meta_title         = get_setting('meta_title');
        $meta_description   = get_setting('meta_description');
    @endphp
@endif

@section('meta_title'){{ $meta_title }}@stop
@section('meta_description'){{ $meta_description }}@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $meta_title }}">
    <meta itemprop="description" content="{{ $meta_description }}">

    <!-- Twitter Card data -->
    <meta name="twitter:title" content="{{ $meta_title }}">
    <meta name="twitter:description" content="{{ $meta_description }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $meta_title }}" />
    <meta property="og:description" content="{{ $meta_description }}" />
@endsection

@section('content')

    <section>
        <div class="home-banner-area mb-3">
            <div class="content-title-listing-product mb-3">
                <h5 class="mb-2 pt-2">وصل حديثا</h5>
                <h1 class="h6 fw-600 text-body">440 منتج</h1>
            </div>
            <div class="container new-come-resp">
                <h5 class="mb-4 title-listing-product">وصل حديثا</h5>
                <div class="row gutters-10 position-relative">
                    <div class="col-12">
                        <div class="aiz-carousel gutters-10 half-outside-arrow" data-xl-items="9" data-lg-items="7"  data-md-items="5" data-sm-items="4" data-arrows='true' style="margin-bottom: 20px">
                            <div class="carousel-box">
                                <a href="" class="d-inline-block mb-0" style="background-color: rgba(176, 179, 178, .15);border:1px solid #ccc; padding:7px 12px !important; border-radius: 50px; color:#222222; width: fit-content;text-align: center;">
                                    فساتين سهرة
                                </a>
                            </div>
                            <div class="carousel-box">
                                <a href="" class="d-inline-block mb-0" style="background-color: rgba(176, 179, 178, .15);border:1px solid #ccc; padding:7px 12px !important; border-radius: 50px; color:#222222; width: fit-content;text-align: center;">
                                    فساتين سهرة
                                </a>
                            </div>
                            <div class="carousel-box">
                                <a href="" class="d-inline-block mb-0" style="background-color: rgba(176, 179, 178, .15);border:1px solid #ccc; padding:7px 12px !important; border-radius: 50px; color:#222222; width: fit-content;text-align: center;">
                                    فساتين سهرة
                                </a>
                            </div>
                            <div class="carousel-box">
                                <a href="" class="d-inline-block mb-0" style="background-color: rgba(176, 179, 178, .15);border:1px solid #ccc; padding:7px 12px !important; border-radius: 50px; color:#222222; width: fit-content;text-align: center;">
                                    فساتين سهرة
                                </a>
                            </div>
                            <div class="carousel-box">
                                <a href="" class="d-inline-block mb-0" style="background-color: rgba(176, 179, 178, .15);border:1px solid #ccc; padding:7px 12px !important; border-radius: 50px; color:#222222; width: fit-content;text-align: center;">
                                    فساتين سهرة
                                </a>
                            </div>
                            <div class="carousel-box">
                                <a href="" class="d-inline-block mb-0" style="background-color: rgba(176, 179, 178, .15);border:1px solid #ccc; padding:7px 12px !important; border-radius: 50px; color:#222222; width: fit-content;text-align: center;">
                                    فساتين سهرة
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="size-listing-product">
                    <div class="row p-2 d-flex justify-content-between" style="margin-top:10px !important">
                        <a href="" class="d-flex justify-content-center align-items-center mb-0" style="background-color: rgba(176, 179, 178, .15);border:1px solid #ccc; padding:7px 12px !important; border-radius: 50px; color:#222222;width:calc(100% / 2 - 10px)">
                            Small
                        </a>
                        <a href="" class="d-flex justify-content-center align-items-center mb-0" style="background-color: rgba(176, 179, 178, .15);border:1px solid #ccc; padding:7px 12px !important; border-radius: 50px; color:#222222;width:calc(100% / 2 - 10px)">
                            Medium
                        </a>
                    </div>
                    <div class="row p-2 d-flex justify-content-between" style="margin-top:10px !important">
                        <a href="" class="d-flex justify-content-center align-items-center mb-0" style="background-color: rgba(176, 179, 178, .15);border:1px solid #ccc; padding:7px 12px !important; border-radius: 50px; color:#222222;width:calc(100% / 2 - 10px)">
                            Large
                        </a>
                        <a href="" class="d-flex justify-content-center align-items-center mb-0" style="background-color: rgba(176, 179, 178, .15);border:1px solid #ccc; padding:7px 12px !important; border-radius: 50px; color:#222222;width:calc(100% / 2 - 10px)">
                            X-Large
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="filter-listing-product alig-items-center" style="border: 1px solid; border-color: rgba(176, 179, 178, .3) transparent;">
            <button data-toggle="class-toggle" data-target=".aiz-filter-sidebar-order" class="d-flex align-items-center justify-content-center" style="width:calc(100% / 2 - 10px);cursor: pointer;border:none;background-color: transparent;">
                <img src="{{static_asset('assets/icons/order.svg')}}" class="d-flex align-items-center">
                <p class="mb-0 p-2 fs-18">رتب حسب</p>
            </button>
            <div style="width: 1px;height: 30px;margin-top: 5px; background-color: rgba(176, 179, 178, .3)"></div>
            <button data-toggle="class-toggle" data-target=".aiz-filter-sidebar-filter" class="d-flex align-items-center justify-content-center" style="width:calc(100% / 2 - 10px);cursor: pointer;border:none;background-color: transparent;">
                <i class="fs-20 las la-sliders-h d-flex align-items-center" style="color: #DE68C9"></i>
                <p class="mb-0 p-2 fs-18">الفلاتر</p>
            </button>
        </div>
    </section>

    <section class="mb-6 pt-3" style="margin-bottom: 70px">
        <div class="container sm-px-0">
            <form class="" id="search-form" action="" method="GET">
                <div class="row">
                    <div class="col-xl-3">
                        
                        <!-- side bar for filter-->
                        <div class="aiz-filter-sidebar-filter collapse-sidebar-wrap sidebar-xl sidebar-right z-1035">
                            <div class="overlay overlay-fixed dark c-pointer" data-toggle="class-toggle" data-target=".aiz-filter-sidebar-filter" data-same=".filter-sidebar-thumb"></div>
                            <div class="collapse-sidebar c-scrollbar-light text-left">
                                <div class="d-flex d-xl-none justify-content-between align-items-center pl-3 border-bottom">
                                    <h3 class="h6" style="color: rgba(176, 179, 178, 1);">الفلاتر</h3>
                                    <button type="button" class="btn btn-sm p-2 filter-sidebar-thumb" data-toggle="class-toggle" data-target=".aiz-filter-sidebar-filter" >
                                        <i class="las la-times la-2x"></i>
                                    </button>
                                </div>

                                <!-- start categories  -->
                                <div class="bg-white shadow-sm rounded">
                                    <div class="fs-15 p-3 border-bottom">
                                        <a href="#collapse_1" class="dropdown-toggle filter-section text-dark" data-toggle="collapse">
                                            الفئات
                                        </a>
                                    </div>
                                    <div class="collapse show" id="collapse_1">
                                        <ul class="p-3 list-unstyled">
                                            @if (!isset($category_id))
                                                @foreach (\App\Models\Category::where('level', 0)->get() as $category)
                                                    <li class="mb-2 ml-2">
                                                        <!-- <a class="text-reset fs-14" href="{{ route('products.category', $category->slug) }}">{{ $category->getTranslation('name') }}</a> -->
                                                        <div class="d-flex">
                                                            <input type="checkbox" name="category[]" id="$category->slug" style="margin-left: 8px">
                                                            <label for="$category->slug">{{ $category->getTranslation('name') }}</label>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @else
                                                <li class="mb-2">
                                                    <a class="text-reset fs-14" href="{{ route('search') }}">
                                                        <i class="las la-angle-left"></i>
                                                        {{ translate('All Categories')}}
                                                    </a>
                                                </li>
                                                @if (\App\Models\Category::find($category_id)->parent_id != 0)
                                                    <li class="mb-2">
                                                        <a class="text-reset fs-14" href="{{ route('products.category', \App\Models\Category::find(\App\Models\Category::find($category_id)->parent_id)->slug) }}">
                                                            <i class="las la-angle-left"></i>
                                                            {{ \App\Models\Category::find(\App\Models\Category::find($category_id)->parent_id)->getTranslation('name') }}
                                                        </a>
                                                    </li>
                                                @endif
                                                <li class="mb-2">
                                                    <a class="text-reset fs-14" href="{{ route('products.category', \App\Models\Category::find($category_id)->slug) }}">
                                                        <i class="las la-angle-left"></i>
                                                        {{ \App\Models\Category::find($category_id)->getTranslation('name') }}
                                                    </a>
                                                </li>
                                                @foreach (\App\Utility\CategoryUtility::get_immediate_children_ids($category_id) as $key => $id)
                                                    <li class="ml-4 mb-2">
                                                        <a class="text-reset fs-14" href="{{ route('products.category', \App\Models\Category::find($id)->slug) }}">{{ \App\Models\Category::find($id)->getTranslation('name') }}</a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <!-- end categories  -->

                                <!-- start size  -->
                                @foreach ($attributes as $attribute)
                                    <div class="bg-white shadow-sm rounded">
                                        <div class="fs-15 p-3 border-bottom">
                                            <a href="#" class="dropdown-toggle text-dark filter-section collapsed" data-toggle="collapse" data-target="#collapse_{{ str_replace(' ', '_', $attribute->name) }}">
                                                المقاس
                                            </a>
                                        </div>
                                        <div class="collapse" id="collapse_{{ str_replace(' ', '_', $attribute->name) }}">
                                            <div class="p-3  aiz-checkbox-list">
                                                @foreach ($attribute->attribute_values as $attribute_value)
                                                    <label class="aiz-checkbox">
                                                        <input
                                                            type="checkbox"
                                                            name="selected_attribute_values[]"
                                                            value="{{ $attribute_value->value }}" @if (in_array($attribute_value->value, $selected_attribute_values)) checked @endif
                                                            onchange="filter()"
                                                        >
                                                        <span class="aiz-square-check"></span>
                                                        <span>{{ $attribute_value->value }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @break
                                @endforeach
                                <!-- end size  -->

                                <!-- start color  -->
                                <div class="bg-white shadow-sm rounded">
                                    <div class="fs-15 p-3 border-bottom">
                                        <a href="#" class="dropdown-toggle text-dark filter-section collapsed" data-toggle="collapse" data-target="#collapse_color">
                                            اللون
                                        </a>    
                                    </div>
                                    <div class="collapse" id="collapse_color">
                                        <div class="p-3 aiz-radio-inline">
                                            @foreach ($colors as $key => $color)
                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="{{ $color->name }}" >
                                                <input
                                                    type="radio"
                                                    name="color"
                                                    value="{{ $color->code }}"
                                                    onchange="filter()"
                                                    @if(isset($selected_color) && $selected_color == $color->code) checked @endif
                                                >
                                                <span class="d-flex align-items-center justify-content-center mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: {{ $color->code }};border-radius: 50px !important"></span>
                                                </span>
                                            </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- end color  -->

                                {{-- <button type="submit" class="btn btn-styled btn-block btn-base-4">Apply filter</button> --}}
                            </div>
                        </div>
                        <!-- side bar for order-->
                        <div class="aiz-filter-sidebar-order collapse-sidebar-wrap sidebar-xl sidebar-right z-1035">
                            <div class="overlay overlay-fixed dark c-pointer" data-toggle="class-toggle" data-target=".aiz-filter-sidebar-order" data-same=".filter-sidebar-thumb"></div>
                            <div class="collapse-sidebar c-scrollbar-light text-left">
                                <div class="d-flex d-xl-none justify-content-between align-items-center pl-3 border-bottom">
                                    <h3 class="h6" style="color: rgba(176, 179, 178, 1);">الترتيب</h3>
                                    <button type="button" class="btn btn-sm p-2 filter-sidebar-thumb" data-toggle="class-toggle" data-target=".aiz-filter-sidebar-order" >
                                        <i class="las la-times la-2x"></i>
                                    </button>
                                </div>

                                <!-- start price  -->
                                <div class="bg-white shadow-sm rounded">
                                    <div class="d-flex align-items-center fs-15 p-3 border-bottom">
                                        <p class="mb-0">السعر</p>
                                        <p class="mb-0" style="margin-right: 4px; color: rgba(176, 179, 178, 1)">( الأقل فالأكثر )</p>
                                    </div>
                                </div>
                                <div class="bg-white shadow-sm rounded">
                                    <div class="d-flex align-items-center fs-15 p-3 border-bottom">
                                        <p class="mb-0">السعر</p>
                                        <p class="mb-0" style="margin-right: 4px; color: rgba(176, 179, 178, 1)">( الأكثر فالأقل )</p>
                                    </div>
                                </div>
                                <!-- end price  -->

                                {{-- <button type="submit" class="btn btn-styled btn-block btn-base-4">Apply filter</button> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <!-- route path  -->
                        <ul class="path-listing-product breadcrumb bg-transparent p-0">
                            <li class="breadcrumb-item opacity-50">
                                <a class="text-reset" href="{{ route('home') }}">{{ translate('Home')}}</a>
                            </li>
                            @if(!isset($category_id))
                                <li class="breadcrumb-item fw-600  text-dark">
                                    <a class="text-reset" href="{{ route('search') }}">"{{ translate('All Categories')}}"</a>
                                </li>
                            @else
                                <li class="breadcrumb-item opacity-50">
                                    <a class="text-reset" href="{{ route('search') }}">{{ translate('All Categories')}}</a>
                                </li>
                            @endif
                            @if(isset($category_id))
                                <li class="text-dark fw-600 breadcrumb-item">
                                    <a class="text-reset" href="{{ route('products.category', \App\Models\Category::find($category_id)->slug) }}">"{{ \App\Models\Category::find($category_id)->getTranslation('name') }}"</a>
                                </li>
                            @endif
                        </ul>

                        <div class="filter-lg-listing-product text-left">
                            <div class="row gutters-5 flex-wrap align-items-center">
                                <div class="col-lg col-10">
                                    <h1 class="h6 fw-600 text-body">
                                        440 منتج
                                    </h1>
                                    <input type="hidden" name="keyword" value="{{ $query }}">
                                </div>
                                <div class="col-2 col-lg-auto d-xl-none mb-lg-3 text-right">
                                    <button type="button" class="btn btn-icon p-0" data-toggle="class-toggle" data-target=".aiz-filter-sidebar">
                                        <i class="la la-filter la-2x"></i>
                                    </button>
                                </div>
                                <div class="col-6 col-lg-auto mb-3 w-lg-200px p-2" style="border-radius: 10px">
                                    <select class="form-control form-control-sm aiz-selectpicker" name="sort_by" onchange="filter()">
                                        <option value="newest" @isset($sort_by) @if ($sort_by == 'newest') selected @endif @endisset>رتب حسب</option>
                                        <option value="newest" @isset($sort_by) @if ($sort_by == 'newest') selected @endif @endisset>{{ translate('Newest')}}</option>
                                        <option value="oldest" @isset($sort_by) @if ($sort_by == 'oldest') selected @endif @endisset>{{ translate('Oldest')}}</option>
                                        <option value="price-asc" @isset($sort_by) @if ($sort_by == 'price-asc') selected @endif @endisset>{{ translate('Price low to high')}}</option>
                                        <option value="price-desc" @isset($sort_by) @if ($sort_by == 'price-desc') selected @endif @endisset>{{ translate('Price high to low')}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="sugg-listing-product sugg mb-3">
                            <div class="btns d-flex">
                                <button href="#" class="p-0 d-flex align-items-center" 
                                    style=";font-size:16px;background-color: #F9F9F9;border: 0.7px solid #B0B3B2;border-radius: 2px;color: #222222;">
                                    <div class="icon d-flex align-items-center justify-content-center pl-2"  style="border-left: 0.7px solid #B0B3B2;height: 100%;">
                                        <i class="fs-20 las la-times"></i>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center" style="width: 100%;">
                                        <p class="mb-0 pl-3">وصل حديثا فساتين</p>
                                    </div>
                                </button>
                                <button type="button" class="btn bg-white" style="width: 130px !important; border-color:rgba(34, 34, 34, .3);margin-right: 10px;opacity: .5;">
                                    <p class="mb-0" style="color: rgba(34, 34, 34, .3)"></p>
                                    حذف الفلاتر
                                </button>
                            </div>
                        </div>

                        <input type="hidden" name="min_price" value="">
                        <input type="hidden" name="max_price" value="">
                        <div class="row gutters-5 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-4 row-cols-md-3 row-cols-2">
                            @foreach ($products as $key => $product)
                                <div class="col">
                                    @include('frontend.partials.product_box_listing',['product' => $product])
                                </div>
                            @endforeach
                        </div>
                        <div class="aiz-pagination aiz-pagination-center mt-4">
                            {{ $products->appends(request()->input())->links() }}
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection

@section('script')
    <script type="text/javascript">
        function filter(){
            $('#search-form').submit();
        }
        function rangefilter(arg){
            $('input[name=min_price]').val(arg[0]);
            $('input[name=max_price]').val(arg[1]);
            filter();
        }
    </script>
@endsection

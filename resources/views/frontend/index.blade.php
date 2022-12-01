@extends('frontend.layouts.app')

@section('content')
    <div class="search-bar-resp p-2" style="background-color: #22222210">
        <div class="input-group" style="border:0.7px solid rgba(176, 179, 178, .3);border-radius: 10px;overflow: hidden;">
            <input type="text" class="border-0 border-lg form-control" id="search" name="keyword" @isset($query)
                value="{{ $query }}"
                style=" border-radius: 12px !important;background-color: #F9F9F9;position: relative;border-radius: 4px;"
            @endisset placeholder="{{translate('I am shopping for...')}}" autocomplete="off">
            <!-- <div class="input-group-append d-none d-lg-block"> -->
            <button class="" type="submit"
                    style="border-radius: 12px;background-color: transparent;border: none;position: absolute;left: 10px;top: calc(50% - 9px);">
                <i class="la la-search la-flip-horizontal fs-18" style="color: #DE68C9;"></i>
            </button>
            <!-- </div> -->
        </div>
    </div>

    {{-- Categories , Sliders . Today's deal --}}
    <div class="home-banner-area mb-4 pt-3">
        <div class="container">
            <div class="row gutters-10 position-relative">
                @php
                    $num_todays_deal = count($todays_deal_products);
                @endphp

                <!-- <div class="@if($num_todays_deal > 0) col-lg-7 @else col-lg-9 @endif"> -->
                <div class="col">
                    @if (get_setting('home_slider_images') != null)
                        <div class="aiz-carousel dots-inside-bottom mobile-img-auto-height" data-arrows="true" data-dots="true" data-autoplay="true">
                            @php $slider_images = json_decode(get_setting('home_slider_images'), true);  @endphp
                            @foreach ($slider_images as $key => $value)
                                <div class="carousel-box">
                                    <a href="{{ json_decode(get_setting('home_slider_links'), true)[$key] }}">
                                        <img
                                            class="d-block mw-100 img-fit rounded shadow-sm overflow-hidden"
                                            src="{{ uploaded_asset($slider_images[$key]) }}"
                                            alt="{{ env('APP_NAME')}} promo"
                                            @if(count($featured_categories) == 0)
                                            height="457"
                                            @else
                                            height="315"
                                            @endif
                                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';"
                                        >
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    @if (count($featured_categories) > 0)
                        <div class="gutters-10 aiz-carousel half-outside-arrow" data-items="10" data-xl-items="10" data-lg-items="7"  data-md-items="5" data-sm-items="6" data-xs-items="6" data-arrows='false'>
                            @foreach ($featured_categories as $key => $category)
                            <div class="carousel-box">
                                <div class="minw-0 home-story">
                                    <a href="">
                                        <img src="{{ static_asset('assets/img/bg.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- <ul class="list-unstyled mb-0 row gutters-15 home-story">
                            @foreach ($featured_categories as $key => $category)
                                <li class="minw-0 col-4 col-md">
                                    <a href="{{ route('products.category', $category->slug) }}" class="d-block p-2 text-reset">
                                        <img
                                            src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                            data-src="{{ uploaded_asset($category->banner) }}"
                                            alt="{{ $category->getTranslation('name') }}"
                                            class="lazyload img-fit"
                                            height="78"
                                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';"
                                        >
                                    </a>
                                </li>
                            @endforeach
                        </ul> -->
                    @endif
                </div>

                <!-- @if($num_todays_deal > 0)
                <div class="col-lg-2 order-3 mt-3 mt-lg-0">
                    <div class="bg-white rounded shadow-sm">
                        <div class="bg-soft-primary rounded-top p-3 d-flex align-items-center justify-content-center">
                            <span class="fw-600 fs-16 mr-2 text-truncate">
                                {{ translate('Todays Deal') }}
                            </span>
                            <span class="badge badge-primary badge-inline">{{ translate('Hot') }}</span>
                        </div>
                        <div class="c-scrollbar-light overflow-auto h-lg-400px p-2 bg-primary rounded-bottom">
                            <div class="gutters-5 lg-no-gutters row row-cols-2 row-cols-lg-1">
                            @foreach ($todays_deal_products as $key => $product)
                                @if ($product != null)
                                <div class="col mb-2">
                                    <a href="{{ route('product', $product->slug) }}" class="d-block p-2 text-reset bg-white h-100 rounded">
                                        <div class="row gutters-5 align-items-center">
                                            <div class="col-xxl">
                                                <div class="img">
                                                    <img
                                                        class="lazyload img-fit h-140px h-lg-80px"
                                                        src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                        data-src="{{ uploaded_asset($product->thumbnail_img) }}"
                                                        alt="{{ $product->getTranslation('name') }}"
                                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-xxl">
                                                <div class="fs-16">
                                                    <span class="d-block text-primary fw-600">{{ home_discounted_base_price($product) }}</span>
                                                    @if(home_base_price($product) != home_discounted_base_price($product))
                                                        <del class="d-block opacity-70">{{ home_base_price($product) }}</del>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endif
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif -->

            </div>
        </div>
    </div>

    {{-- Banner section 1 --}}
    @if (get_setting('home_banner1_images') != null)
    <div class="mb-4">
        <div class="container">
            <div class="row gutters-10">
                @php $banner_1_imags = json_decode(get_setting('home_banner1_images')); @endphp
                @foreach ($banner_1_imags as $key => $value)
                    <div class="col-xl col-md-6">
                        <div class="mb-3 mb-lg-0">
                            <a href="{{ json_decode(get_setting('home_banner1_links'), true)[$key] }}" class="d-block text-reset">
                                <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ uploaded_asset($banner_1_imags[$key]) }}" alt="{{ env('APP_NAME') }} promo" class="img-fluid lazyload w-100">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif


    {{-- Flash Deal --}}
    @php
        $flash_deal = \App\Models\FlashDeal::where('status', 1)->where('featured', 1)->first();
    @endphp
    @if($flash_deal != null && strtotime(date('Y-m-d H:i:s')) >= $flash_deal->start_date && strtotime(date('Y-m-d H:i:s')) <= $flash_deal->end_date)
    <section class="mb-4">
        <div class="container">
            <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">

                <div class="d-flex flex-wrap mb-3 align-items-baseline border-bottom">
                    <h3 class="h5 fw-700 mb-0">
                        <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">{{ translate('Flash Sale') }}</span>
                    </h3>
                    <div class="aiz-count-down ml-auto ml-lg-3 align-items-center" data-date="{{ date('Y/m/d H:i:s', $flash_deal->end_date) }}"></div>
                    <a href="{{ route('flash-deal-details', $flash_deal->slug) }}" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md w-100 w-md-auto">{{ translate('View More') }}</a>
                </div>

                <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'>
                    @foreach ($flash_deal->flash_deal_products->take(20) as $key => $flash_deal_product)
                        @php
                            $product = \App\Models\Product::find($flash_deal_product->product_id);
                        @endphp
                        @if ($product != null && $product->published != 0)
                            <div class="carousel-box">
                                @include('frontend.partials.product_box_1',['product' => $product])
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif

    <div id="section-pub1">
        <section class="mb-4">
            <div class="container">
                <!-- <div class="px-2 px-md-4 bg-white shadow-sm rounded"> -->
                <div class="pub-2-home-resp rounded position-relative">
                    @include('frontend.partials.product_pub_2')

                    <div class="titles-pub1 pub2 d-flex align-items-center flex-column" style="width:200px;position: absolute; bottom:30px;right:50%;transform: translateX(50%);">
                        <h4 style="font-size: 22px;text-align:center; color: white">خامات جينز</h4>
                        <h2 class="mb-2" style="font-size: 25px;text-align:center; color: white">جودة عالية عالمية<h2>
                        <button style="font-size: 16px;font-weight:500;padding:6px 35px">ابدأ الأن</button>
                    </div>
                </div>
                <div class="pub-1-home-resp rounded">
                    <div class="aiz-carousel" data-items="1" data-arrows='true'>
                        @foreach ($newest_products as $key => $new_product)
                        <div class="carousel-box">
                            @include('frontend.partials.product_pub_1',['product' => $new_product])
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section> 
    </div>

    <div class="categories-resp container">
        <div class="row">
            <div class="col-6 d-flex align-items-center p-4">
                <div class="d-flex align-items-center justify-content-center" style="width: 40%">
                    <img src="{{static_asset('assets/icons/left-arrow.svg')}}" alt="">
                </div>
                <p class="mb-0" style="width:60%">فساتين</p>
            </div>
            <div class="col-6 d-flex align-items-center p-4">
                <div class="d-flex align-items-center justify-content-center" style="width: 40%">
                    <img src="{{static_asset('assets/icons/left-arrow.svg')}}" alt="">
                </div>
                <p class="mb-0" style="width:60%">فساتين سهرات</p>
            </div>
            <div class="col-6 d-flex align-items-center p-4">
                <div class="d-flex align-items-center justify-content-center" style="width: 40%">
                    <img src="{{static_asset('assets/icons/left-arrow.svg')}}" alt="">
                </div>
                <p class="mb-0" style="width:60%">ملابس</p>
            </div>
            <div class="col-6 d-flex align-items-center p-4">
                <div class="d-flex align-items-center justify-content-center" style="width: 40%">
                    <img src="{{static_asset('assets/icons/left-arrow.svg')}}" alt="">
                </div>
                <p class="mb-0" style="width:60%">أحذية</p>
            </div>
            <div class="col-6 d-flex align-items-center p-4" style="border-bottom-color: transparent;">
                <div class="d-flex align-items-center justify-content-center" style="width: 40%">
                    <img src="{{static_asset('assets/icons/left-arrow.svg')}}" alt="">
                </div>
                <p class="mb-0" style="width:60%">كماليات</p>
            </div>
            <div class="col-6 d-flex align-items-center p-4">
                <div class="d-flex align-items-center justify-content-center" style="width: 40%">
                    <img src="{{static_asset('assets/icons/left-arrow.svg')}}" alt="">
                </div>
                <p class="mb-0" style="width:60%">المقالات</p>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <p class="mb-0 fs-24" style="color:#DE68C9">جميع الفئات</p>
        </div>
    </div>

    <div id="section_newest">
        @if (count($newest_products) > 0)
            <section class="mb-4">
                <div class="container">
                    <div class="px-2 py-4 px-md-4 py-md-3 rounded newest-content-items">
                        <div class="d-flex mb-3">
                            <h2>وصل حديثاً</h2>
                            <h4>انتقل لعرض جميع المنتجات</h4>
                        </div>
                        <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="5" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-dots="true">
                            @foreach ($newest_products as $key => $new_product)
                            <div class="carousel-box">
                                @include('frontend.partials.product_box_1',['product' => $new_product])
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>   
        @endif
    </div>

    <div id="section_pub3">
        <section class="mb-4">
            <div class="container">
                <div class="rounded">
                    @include('frontend.partials.product_pub_2')
                    <div class="details">
                        <button>تصفيات الموسم</button>
                        <button class="d-flex align-items-center">
                            <span>منتجات 1</span>
                            <i style="margin-right: 5px" class="fs-24 las la-arrow-left"></i>
                        </button>
                        <button class="d-flex align-items-center">
                            <span>منتجات 2</span>
                            <i style="margin-right: 5px" class="fs-24 las la-arrow-left"></i>
                        </button>
                        <button class="d-flex align-items-center">
                            <span>منتجات 3</span>
                            <i style="margin-right: 5px" class="fs-24 las la-arrow-left"></i>
                        </button>
                        <button class="d-flex align-items-center">
                            <span>منتجات 4</span>
                            <i style="margin-right: 5px" class="fs-24 las la-arrow-left"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section> 
    </div>

    <div id="section_brand">
        @if (count($newest_products) > 0)
            <section class="mb-4">
                <div class="container">
                    <div class="px-2 py-4 px-md-4 py-md-3 rounded brand-content-items">
                        <div class="d-flex mb-3">
                            <h2>براندا وينس</h2>
                            <h4>احصل على الهام مميز لأحدث الموضات من خلال هذا التجميعات</h4>
                        </div>
                        <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="3" data-xl-items="3" data-lg-items="3"  data-md-items="2" data-sm-items="2" data-xs-items="1" data-arrows='true' data-dots='true'>
                            @foreach ($newest_products as $key => $new_product)
                            <div class="carousel-box">
                                @include('frontend.partials.product_box_2',['product' => $new_product])
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>   
        @endif
    </div>

    <div id="section_most_sell">
        @if (count($newest_products) > 0)
            <section class="mb-4">
                <div class="container">
                    <div class="px-2 py-4 px-md-4 py-md-3 rounded most-sell-content-items">
                        <div class="d-flex mb-3">
                            <h2>الأكثر مبيعا هذا الإسبوع</h2>
                            <h4>اضمن أناقتك مع القطع الرائعة لهذا الموسم!</h4>
                        </div>
                        <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="5" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-dots="true">
                            @foreach ($newest_products as $key => $new_product)
                            <div class="carousel-box">
                                @include('frontend.partials.product_box_3',['product' => $new_product])
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>   
        @endif
    </div>

    <div id="section_pub4">
        <section class="mb-4">
            <div class="container">
                <div class="rounded">
                    @include('frontend.partials.product_pub_3')
                </div>
            </div>
        </section> 
    </div>

    <div id="section_story">
        <div id="section_newest">
            @if (count($newest_products) > 0)
                <section class="mb-4">
                    <div class="container">
                        <div class="px-2 py-4 px-md-4 py-md-3 rounded newest-content-items">
                            <div class="d-flex mb-3">
                                <h2>ام سي ستوري</h2>
                                <h4>لا تنس أن تكمل تركيباتك الجميلة بابتسامة &#10084;</h4>
                            </div>
                            <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="4" data-xl-items="4" data-lg-items="3"  data-md-items="2" data-sm-items="1" data-xs-items="2" data-arrows='true'>
                                @foreach ($newest_products as $key => $new_product)
                                <div class="carousel-box">
                                    @include('frontend.partials.product_box_1',['product' => $new_product])
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="pub-story-home-resp">
                            <img src="{{ static_asset('assets/img/bg.jpg') }}" alt="">
                            <div class="details">
                                <h5>معطف شتاء</h5>
                                <h2>صناعة بريطانية</h2>
                                <button>تسوق الأن</button>
                            </div>
                        </div>  
                    </div>
                    <div class="container">
                        <h5><a href="">
                            عرض كل المنتجات
                        </a></h5>
                    </div>
                </section>   
            @endif
        </div>
    </div>
    
    <div id="section_article">
        @if (count($newest_products) > 0)
            <section class="mb-4">
                <div class="container">
                    <div class="px-2 py-4 px-md-4 py-md-3 rounded brand-content-items">
                        <div class="d-flex mb-3">
                            <h2>مقالات ام سي</h2>
                            <h4>اتجاهات الموسم الجديد ، أنماط المشاهير ، افعل ذلك بنفسك ، مجموعات خاصة وأكثر من ذلك بكثير في المحتوى التحريري الخاص بنا. تحقق من منشورات مدونتنا ولقطاتنا الخاصة وأحدث محتوى فيديو أعددناه لك.</h4>
                        </div>
                        <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="3" data-xl-items="3" data-lg-items="3"  data-md-items="2" data-sm-items="2" data-xs-items="1" data-arrows='true' data-dots="true">
                            @foreach ($newest_products as $key => $new_product)
                            <div class="carousel-box">
                                @include('frontend.partials.product_box_4',['product' => $new_product])
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>   
        @endif
    </div>
    <!-- Auction Product -->
    <!-- @if(addon_is_activated('auction'))
        <div id="auction_products">

        </div>
    @endif -->



    <!-- {{-- Banner Section 2 --}}
    @if (get_setting('home_banner2_images') != null)
    <div class="mb-4">
        <div class="container">
            <div class="row gutters-10">
                @php $banner_2_imags = json_decode(get_setting('home_banner2_images')); @endphp
                @foreach ($banner_2_imags as $key => $value)
                    <div class="col-xl col-md-6">
                        <div class="mb-3 mb-lg-0">
                            <a href="{{ json_decode(get_setting('home_banner2_links'), true)[$key] }}" class="d-block text-reset">
                                <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ uploaded_asset($banner_2_imags[$key]) }}" alt="{{ env('APP_NAME') }} promo" class="img-fluid lazyload w-100">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif -->

    <!-- {{-- Category wise Products --}}
    <div id="section_home_categories">

    </div> -->

    {{-- Classified Product --}}
    @if(get_setting('classified_product') == 1)
        @php
            $classified_products = \App\Models\CustomerProduct::where('status', '1')->where('published', '1')->take(10)->get();
        @endphp
           @if (count($classified_products) > 0)
               <section class="mb-4">
                   <div class="container">
                       <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
                            <div class="d-flex mb-3 align-items-baseline border-bottom">
                                <h3 class="h5 fw-700 mb-0">
                                    <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">{{ translate('Classified Ads') }}</span>
                                </h3>
                                <a href="{{ route('customer.products') }}" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">{{ translate('View More') }}</a>
                            </div>
                           <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'>
                               @foreach ($classified_products as $key => $classified_product)
                                   <div class="carousel-box">
                                        <div class="aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition">
                                            <div class="position-relative">
                                                <a href="{{ route('customer.product', $classified_product->slug) }}" class="d-block">
                                                    <img
                                                        class="img-fit lazyload mx-auto h-140px h-md-210px"
                                                        src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                        data-src="{{ uploaded_asset($classified_product->thumbnail_img) }}"
                                                        alt="{{ $classified_product->getTranslation('name') }}"
                                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                                    >
                                                </a>
                                                <div class="absolute-top-left pt-2 pl-2">
                                                    @if($classified_product->conditon == 'new')
                                                       <span class="badge badge-inline badge-success">{{translate('new')}}</span>
                                                    @elseif($classified_product->conditon == 'used')
                                                       <span class="badge badge-inline badge-danger">{{translate('Used')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="p-md-3 p-2 text-left">
                                                <div class="fs-15 mb-1">
                                                    <span class="fw-700 text-primary">{{ single_price($classified_product->unit_price) }}</span>
                                                </div>
                                                <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                                    <a href="{{ route('customer.product', $classified_product->slug) }}" class="d-block text-reset">{{ $classified_product->getTranslation('name') }}</a>
                                                </h3>
                                            </div>
                                       </div>
                                   </div>
                               @endforeach
                           </div>
                       </div>
                   </div>
               </section>
           @endif
       @endif

    {{-- Banner Section 2 --}}
    @if (get_setting('home_banner3_images') != null)
    <div class="mb-4">
        <div class="container">
            <div class="row gutters-10">
                @php $banner_3_imags = json_decode(get_setting('home_banner3_images')); @endphp
                @foreach ($banner_3_imags as $key => $value)
                    <div class="col-xl col-md-6">
                        <div class="mb-3 mb-lg-0">
                            <a href="{{ json_decode(get_setting('home_banner3_links'), true)[$key] }}" class="d-block text-reset">
                                <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ uploaded_asset($banner_3_imags[$key]) }}" alt="{{ env('APP_NAME') }} promo" class="img-fluid lazyload w-100">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <!-- {{-- Best Seller --}}
    <div id="section_best_sellers">

    </div> -->

    <!-- {{-- Top 10 categories and Brands --}}
    @if (get_setting('top10_categories') != null && get_setting('top10_brands') != null)
    <section class="mb-4">
        <div class="container">
            <div class="row gutters-10">
                @if (get_setting('top10_categories') != null)
                    <div class="col-lg-6">
                        <div class="d-flex mb-3 align-items-baseline border-bottom">
                            <h3 class="h5 fw-700 mb-0">
                                <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">{{ translate('Top 10 Categories') }}</span>
                            </h3>
                            <a href="{{ route('categories.all') }}" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">{{ translate('View All Categories') }}</a>
                        </div>
                        <div class="row gutters-5">
                            @php $top10_categories = json_decode(get_setting('top10_categories')); @endphp
                            @foreach ($top10_categories as $key => $value)
                                @php $category = \App\Models\Category::find($value); @endphp
                                @if ($category != null)
                                    <div class="col-sm-6">
                                        <a href="{{ route('products.category', $category->slug) }}" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-3 text-center">
                                                    <img
                                                        src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                        data-src="{{ uploaded_asset($category->banner) }}"
                                                        alt="{{ $category->getTranslation('name') }}"
                                                        class="img-fluid img lazyload h-60px"
                                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                                    >
                                                </div>
                                                <div class="col-7">
                                                    <div class="text-truncat-2 pl-3 fs-14 fw-600 text-left">{{ $category->getTranslation('name') }}</div>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <i class="la la-angle-right text-primary"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
                @if (get_setting('top10_brands') != null)
                    <div class="col-lg-6">
                        <div class="d-flex mb-3 align-items-baseline border-bottom">
                            <h3 class="h5 fw-700 mb-0">
                                <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">{{ translate('Top 10 Brands') }}</span>
                            </h3>
                            <a href="{{ route('brands.all') }}" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">{{ translate('View All Brands') }}</a>
                        </div>
                        <div class="row gutters-5">
                            @php $top10_brands = json_decode(get_setting('top10_brands')); @endphp
                            @foreach ($top10_brands as $key => $value)
                                @php $brand = \App\Models\Brand::find($value); @endphp
                                @if ($brand != null)
                                    <div class="col-sm-6">
                                        <a href="{{ route('products.brand', $brand->slug) }}" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-4 text-center">
                                                    <img
                                                        src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                        data-src="{{ uploaded_asset($brand->logo) }}"
                                                        alt="{{ $brand->getTranslation('name') }}"
                                                        class="img-fluid img lazyload h-60px"
                                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                                    >
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-truncate-2 pl-3 fs-14 fw-600 text-left">{{ $brand->getTranslation('name') }}</div>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <i class="la la-angle-right text-primary"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    @endif -->
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $.post('{{ route('home.section.featured') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_featured').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('{{ route('home.section.best_selling') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_best_selling').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('{{ route('home.section.auction_products') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#auction_products').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('{{ route('home.section.home_categories') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_home_categories').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('{{ route('home.section.best_sellers') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_best_sellers').html(data);
                AIZ.plugins.slickCarousel();
            });
        });
    </script>
@endsection

@extends('frontend.layouts.app')

@section('meta_title'){{ $detailedProduct->meta_title }}@stop

@section('meta_description'){{ $detailedProduct->meta_description }}@stop

@section('meta_keywords'){{ $detailedProduct->tags }}@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $detailedProduct->meta_title }}">
    <meta itemprop="description" content="{{ $detailedProduct->meta_description }}">
    <meta itemprop="image" content="{{ uploaded_asset($detailedProduct->meta_img) }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ $detailedProduct->meta_title }}">
    <meta name="twitter:description" content="{{ $detailedProduct->meta_description }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ uploaded_asset($detailedProduct->meta_img) }}">
    <meta name="twitter:data1" content="{{ single_price($detailedProduct->unit_price) }}">
    <meta name="twitter:label1" content="Price">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $detailedProduct->meta_title }}" />
    <meta property="og:type" content="og:product" />
    <meta property="og:url" content="{{ route('product', $detailedProduct->slug) }}" />
    <meta property="og:image" content="{{ uploaded_asset($detailedProduct->meta_img) }}" />
    <meta property="og:description" content="{{ $detailedProduct->meta_description }}" />
    <meta property="og:site_name" content="{{ get_setting('meta_title') }}" />
    <meta property="og:price:amount" content="{{ single_price($detailedProduct->unit_price) }}" />
    <meta property="product:price:currency"
        content="{{ \App\Models\Currency::findOrFail(get_setting('system_default_currency'))->code }}" />
    <meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}">
@endsection

@section('content')
    <section class='product-path'>
        <div class="container">
            <div class="d-flex justify-content-start align-items-center p-2">
                <a class='fs-14' href="">الصفحة الرئيسية</a>
                <span>&gt;</span>
                <a class='fs-14' href="">وصل حديثا</a>
                <span>&gt;</span>                
                <a class='fs-14 act' href="">بنطالون جينز مع بلوزة قطن - سوداء</a>
            </div>
        </div>
    </section>
    <!-- start detail product  -->
    <section class="mb-4 product-details-content">
        <div class="container">
            <div class="rounded p-3">
                <div class="row">
                    <!-- start right side  -->
                    <div class="col-xl-5 col-lg-6">
                        <div>
                            <!-- start images  -->
                            <div class="z-3 row gutters-10">
                                @php
                                    $photos = explode(',', $detailedProduct->photos);
                                @endphp
                                <!-- start big image  -->
                                <div class="col order-1 order-md-2">
                                    <div class="card card-main-img aiz-carousel product-gallery" data-nav-for='.product-gallery-thumb'
                                        data-fade='true' data-auto-height='true' data-dots='true'>
                                        @foreach ($photos as $key => $photo)
                                            <div class="carousel-box img-zoom rounded">
                                                <!-- <img class="main-img img-fluid lazyload h-127px h-md-327px" -->
                                                <img class="main-img img-fit img-fluid lazyload"
                                                    style="width: 100%;"
                                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                    data-src="{{ uploaded_asset($photo) }}"
                                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                            </div>
                                        @endforeach
                                        @foreach ($detailedProduct->stocks as $key => $stock)
                                            @if ($stock->image != null)
                                                <div class="carousel-box img-zoom rounded">
                                                    <img class="img-fluid lazyload"
                                                        src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                        data-src="{{ uploaded_asset($stock->image) }}"
                                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <!-- end big image  -->
                                <!-- start small images prod  -->
                                <div class="small-img-product-detail col-12 col-md-auto w-md-150px order-2 order-md-1 mt-3 mt-md-0">
                                    <div class="p-1 aiz-carousel product-gallery-thumb" data-items='5'
                                        data-nav-for='.product-gallery' data-vertical='true' data-vertical-sm='false'
                                        data-focus-select='true' data-arrows='false'  style="height: 635px; overflow-y: scroll;direction: ltr;">
                                        @foreach ($photos as $key => $photo)
                                            <div class="carousel-box c-pointer border rounded">
                                                <img class="lazyload mw-100 size-180px mx-auto"
                                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                    data-src="{{ uploaded_asset($photo) }}"
                                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                            </div>
                                        @endforeach
                                        @foreach ($detailedProduct->stocks as $key => $stock)
                                            @if ($stock->image != null)
                                                <div class="carousel-box c-pointer border p-1 rounded"
                                                    data-variation="{{ $stock->variant }}">
                                                    <img class="lazyload mw-100 size-50px mx-auto"
                                                        src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                        data-src="{{ uploaded_asset($stock->image) }}"
                                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <!-- end small images prod -->
                            </div>
                            <!-- end images  -->
                            <!-- start product contact  -->
                            <div class="card contact-product-detail">
                                <div class="card-contact p-3">
                                    <div class="code-product">
                                        <p class="mb-0 fs-14" style="margin: 0;">كود المنتج</p>
                                        <p class="mb-0 fw-500 fs-18">151254</p>
                                    </div>
                                    <div class="contact d-flex justify-content-between align-items-center">
                                        <button class="contact1 bg-white">
                                            <i style="margin-left: 5px" class="fs-24 lab la-whatsapp"></i>
                                            <p class="mb-0 fw-500 fs-16">اطلب عبر الوتس أب</p>
                                        </>
                                        <button class="contact2 bg-white">
                                            <i style="margin-left: 5px" class="fs-24 las la-phone"></i>
                                            <p class="mb-0 fw-500 fs-16">اطلب عبر الوتس أب</p>
                                        </>
                                    </div>
                                </div>
                            </div>
                            <!-- end prodcut contact  -->
                            <!-- start other info  -->
                            <div class="card mb-0 other-info-product-detail">
                                <ul class="more-detail p-4 d-flex justify-content-around align-items-center">
                                    <li>
                                        <img src="" alt="s">
                                        <p class="mb-0">امكانية التبديل</p>
                                    </li>
                                    <li>
                                        <img src="" alt="s">
                                        <p class="mb-0">توصيل سريع</p>
                                    </li>
                                    <li>
                                        <img src="" alt="s">
                                        <p class="mb-0">الدفع عند الإستلام</p>
                                    </li>
                                </ul>
                            </div>
                            <!-- end other info  -->
                        </div>
                    </div>
                    <!-- end right side  -->
                    <!-- start details info  -->
                    <div class="col-xl-7 col-lg-6">
                        <div class="text-left">
                            <!-- image product  -->
                            <div class="card px-3 py-3">
                                <h1 class="mb-2 fs-20 fw-400">
                                    {{ $detailedProduct->getTranslation('name') }}
                                </h1>
                                <div class="d-flex fs-18 stock">
                                    <p class="mb-0">رقم الستوك:</p>
                                    <p class="mb-0">BCW450TRK0002100</pclass=>
                                </div>
                                <div class="discount">
                                    <p class="fs-18">330.00 ر.س</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between fs-18 price">
                                    <p class="mb-0">خصم 10%</p>
                                    <p class='fs-24 mb-0'>250.00 ر.س</pc>
                                </div>
                            </div>

                            <!-- detail prodcut  -->
                            <div class="card px-3 py-3">
                                <h1 class="mb-2 fs-20 fw-400">اللون</h1>
                                <div class="list-img">
                                    <img class='act' src="{{ static_asset('assets/img/placeholder.jpg') }}" alt="">
                                    <img src="{{ static_asset('assets/img/placeholder.jpg') }}" alt="">
                                </div>
                                <hr>
                                <div class="scale d-flex align-items-center justify-content-between">
                                    <h1 class="mb-2 fs-20 fw-400">المقاس</h1>
                                    <div class="panel-scale d-flex">
                                        <i class="fs-24 las la-ruler" style="margin-left: 5px"></i>
                                        <span class="fs-16">لوحة القياسات</span>
                                    </div>
                                </div>
                                <div class="size d-flex">
                                    <div class="act d-flex align-items-center justify-content-center"><p class="22px fw-500">S</p></div>
                                    <div class="d-flex align-items-center justify-content-center"><p class="22px fw-500">M</p></div>
                                    <div class="d-flex align-items-center justify-content-center"><p class="22px fw-500">L</p></div>
                                </div>
                                <div class="buttons d-flex">
                                    <button class="d-flex justify-content-center align-items-center fs-20px">أضف إلى السلة</button>
                                    <button class="d-flex justify-content-center align-items-center bg-white">
                                        <i style="font-size: 34px;" class="lar la-heart"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card">
                                <div class="nav border-bottom aiz-nav-tabs">
                                    <a href="#tab_default_1" data-toggle="tab"
                                        class="p-3 fs-16 fw-600 text-reset active show">{{ translate('Description') }}</a>
                                    @if ($detailedProduct->video_link != null)
                                        <a href="#tab_default_2" data-toggle="tab"
                                            class="p-3 fs-16 fw-600 text-reset">{{ translate('Video') }}</a>
                                    @endif
                                    @if ($detailedProduct->pdf != null)
                                        <a href="#tab_default_3" data-toggle="tab"
                                            class="p-3 fs-16 fw-600 text-reset">{{ translate('Downloads') }}</a>
                                    @endif
                                    <a href="#tab_default_4" data-toggle="tab"
                                        class="p-3 fs-16 fw-600 text-reset">{{ translate('Reviews') }}</a>
                                </div>

                                <div class="tab-content pt-0">
                                    <div class="tab-pane fade active show" id="tab_default_1">
                                        <div class="p-4">
                                            <div class="mw-100 overflow-hidden text-left aiz-editor-data">
                                                <?php echo $detailedProduct->getTranslation('description'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="tab_default_2">
                                        <div class="p-4">
                                            <div class="embed-responsive embed-responsive-16by9">
                                                @if ($detailedProduct->video_provider == 'youtube' && isset(explode('=', $detailedProduct->video_link)[1]))
                                                    <iframe class="embed-responsive-item"
                                                        src="https://www.youtube.com/embed/{{ get_url_params($detailedProduct->video_link, 'v') }}"></iframe>
                                                @elseif ($detailedProduct->video_provider == 'dailymotion' && isset(explode('video/', $detailedProduct->video_link)[1]))
                                                    <iframe class="embed-responsive-item"
                                                        src="https://www.dailymotion.com/embed/video/{{ explode('video/', $detailedProduct->video_link)[1] }}"></iframe>
                                                @elseif ($detailedProduct->video_provider == 'vimeo' && isset(explode('vimeo.com/', $detailedProduct->video_link)[1]))
                                                    <iframe
                                                        src="https://player.vimeo.com/video/{{ explode('vimeo.com/', $detailedProduct->video_link)[1] }}"
                                                        width="500" height="281" frameborder="0" webkitallowfullscreen
                                                        mozallowfullscreen allowfullscreen></iframe>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab_default_3">
                                        <div class="p-4 text-center ">
                                            <a href="{{ uploaded_asset($detailedProduct->pdf) }}"
                                                class="btn btn-primary">{{ translate('Download') }}</a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab_default_4">
                                        <div class="p-4">
                                            <ul class="list-group list-group-flush">
                                                @foreach ($detailedProduct->reviews as $key => $review)
                                                    @if ($review->user != null)
                                                        <li class="media list-group-item d-flex">
                                                            <span class="avatar avatar-md mr-3">
                                                                <img class="lazyload"
                                                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                                                    @if ($review->user->avatar_original != null) data-src="{{ uploaded_asset($review->user->avatar_original) }}"
                                                                @else
                                                                    data-src="{{ static_asset('assets/img/placeholder.jpg') }}" @endif>
                                                            </span>
                                                            <div class="media-body text-left">
                                                                <div class="d-flex justify-content-between">
                                                                    <h3 class="fs-15 fw-600 mb-0">{{ $review->user->name }}
                                                                    </h3>
                                                                    <span class="rating rating-sm">
                                                                        @for ($i = 0; $i < $review->rating; $i++)
                                                                            <i class="las la-star active"></i>
                                                                        @endfor
                                                                        @for ($i = 0; $i < 5 - $review->rating; $i++)
                                                                            <i class="las la-star"></i>
                                                                        @endfor
                                                                    </span>
                                                                </div>
                                                                <div class="opacity-60 mb-2">
                                                                    {{ date('d-m-Y', strtotime($review->created_at)) }}</div>
                                                                <p class="comment-text">
                                                                    {{ $review->comment }}
                                                                </p>
                                                            </div>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>

                                            @if (count($detailedProduct->reviews) <= 0)
                                                <div class="text-center fs-18 opacity-70">
                                                    {{ translate('There have been no reviews for this product yet.') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end details info  -->
                </div>
            </div>
        </div>
    </section>
    <!-- end detail product  -->

    <!-- start prodcut suggestion -->
    <section class="product-details-content-sugg">
        <div class="container">
            <div class="row gutters-10">
                <div class="col-xl-12 order-0 order-xl-1">
                    <div class="rounded">
                        <div class="p-3">
                            <h3 class="fs-16 fw-600 mb-0">
                                <span class="fs-20 fw-400 mr-4">منتجات أخرى قد تعجبك</span>
                            </h3>
                        </div>
                        <div class="p-3">
                            <div class="aiz-carousel gutters-5 half-outside-arrow" data-items="5" data-xl-items="3"
                                data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2"
                                data-arrows='true' data-infinite='true'>
                                @foreach (filter_products(\App\Models\Product::where('category_id', $detailedProduct->category_id)->where('id', '!=', $detailedProduct->id))->limit(10)->get() as $key => $related_product)
                                    <div class="carousel-box position-relative">
                                        <div class="aiz-card-box rounded hov-shadow-md my-2 has-transition">
                                            <div class="mb-3">
                                                <a href="{{ route('product', $related_product->slug) }}"
                                                    class="d-block">
                                                    <img class="img-fit lazyload mx-auto h-327px h-md-327px"
                                                        src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                        data-src="{{ uploaded_asset($related_product->thumbnail_img) }}"
                                                        alt="{{ $related_product->getTranslation('name') }}"
                                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                                </a>
                                            </div>
                                            <div class="card text-left p-2 card-detail-product-sugg">
                                                <h3 class="fs-16 text-truncate-2 lh-1-4 mb-0 h-35px">
                                                    <a href="{{ route('product', $related_product->slug) }}"
                                                        class="d-block text-reset">{{ $related_product->getTranslation('name') }}</a>
                                                </h3>
                                                <div class="fs-15 d-flex justify-content-between align-items-center price">
                                                    <span>عرض خاص</span>
                                                    @if (home_base_price($related_product) != home_discounted_base_price($related_product))
                                                        <del class="fw-600 opacity-50 mr-1">{{ home_base_price($related_product) }}</del>
                                                    @endif
                                                    <span class="fw-700 text-primary">250.00</span>
                                                </div>
                                                @if (addon_is_activated('club_point'))
                                                    <div
                                                        class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
                                                        {{ translate('Club Point') }}:
                                                        <span
                                                            class="fw-700 float-right">{{ $related_product->earn_point }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <a href="">
                                            <div class="icon-favorite d-flex justify-content-center align-items-center">
                                                <i class="fs-20 lar la-heart" style="color: #222222"></i>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    {{-- Product Query --}}
                    @if(get_setting('product_query_activation') == 1)
                        <div class="bg-white rounded shadow-sm mt-3">
                            <div class="border-bottom p-3">
                                <h3 class="fs-18 fw-600 mb-0">
                                    <span>{{ translate(' Product Queries ') }} ({{ $total_query }})</span>
                                </h3>
                            </div>
                            @guest
                                <p class="fs-14 fw-400 mb-0 ml-3 mt-2"><a
                                        href="{{ route('user.login') }}">{{ translate('Login') }}</a> or <a class="mr-1"
                                        href="{{ route('user.registration') }}">{{ translate('Register ') }}</a>{{ translate(' to submit your questions to seller') }}
                                </p>
                            @endguest
                            @auth
                                <div class="query form p-3">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{ route('product-queries.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product" value="{{ $detailedProduct->id }}">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" cols="40" name="question"
                                                placeholder="{{ translate('Write your question here...') }}" style="resize: none;"></textarea>
                                            
                                        </div>
                                        <button type="submit" class="btn btn-primary">{{ translate('Submit') }}</button>
                                    </form>
                                </div>
                                @php
                                    $own_product_queries = Auth::user()->product_queries->where('product_id',$detailedProduct->id);
                                @endphp
                                @if ($own_product_queries->count() > 0)
                                
                                    <div class="question-area my-4   mb-0 ml-3">

                                        <div class="border-bottom py-3">
                                            <h3 class="fs-18 fw-600 mb-0">
                                                <span class="mr-4">{{ translate('My Questions') }}</span>
                                            </h3>
                                        </div>
                                        @foreach ($own_product_queries as $product_query)
                                            <div class="produc-queries border-bottom">
                                                <div class="query d-flex my-4">
                                                    <span class="mt-1"><svg xmlns="http://www.w3.org/2000/svg" width="24.994"
                                                            height="24.981" viewBox="0 0 24.994 24.981">
                                                            <g id="Group_23909" data-name="Group 23909"
                                                                transform="translate(18392.496 11044.037)">
                                                                <path id="Subtraction_90" data-name="Subtraction 90"
                                                                    d="M1830.569-117.742a.4.4,0,0,1-.158-.035.423.423,0,0,1-.252-.446c0-.84,0-1.692,0-2.516v-2.2a5.481,5.481,0,0,1-2.391-.745,5.331,5.331,0,0,1-2.749-4.711c-.034-2.365-.018-4.769,0-7.094l0-.649a5.539,5.539,0,0,1,4.694-5.513,5.842,5.842,0,0,1,.921-.065q3.865,0,7.73,0l5.035,0a5.539,5.539,0,0,1,5.591,5.57c.01,2.577.01,5.166,0,7.693a5.54,5.54,0,0,1-4.842,5.506,6.5,6.5,0,0,1-.823.046l-3.225,0c-1.454,0-2.753,0-3.97,0a.555.555,0,0,0-.435.182c-1.205,1.214-2.435,2.445-3.623,3.636l-.062.062-1.005,1.007-.037.037-.069.069A.464.464,0,0,1,1830.569-117.742Zm7.37-11.235h0l1.914,1.521.817-.754-1.621-1.273a3.517,3.517,0,0,0,1.172-1.487,5.633,5.633,0,0,0,.418-2.267v-.58a5.629,5.629,0,0,0-.448-2.323,3.443,3.443,0,0,0-1.282-1.525,3.538,3.538,0,0,0-1.93-.53,3.473,3.473,0,0,0-1.905.534,3.482,3.482,0,0,0-1.288,1.537,5.582,5.582,0,0,0-.454,2.314v.654a5.405,5.405,0,0,0,.471,2.261,3.492,3.492,0,0,0,1.287,1.5,3.492,3.492,0,0,0,1.9.527,3.911,3.911,0,0,0,.947-.112Zm-.948-.9a2.122,2.122,0,0,1-1.812-.9,4.125,4.125,0,0,1-.652-2.457v-.667a4.008,4.008,0,0,1,.671-2.4,2.118,2.118,0,0,1,1.78-.863,2.138,2.138,0,0,1,1.824.869,4.145,4.145,0,0,1,.639,2.473v.673a4.07,4.07,0,0,1-.655,2.423A2.125,2.125,0,0,1,1836.991-129.881Z"
                                                                    transform="translate(-20217 -10901.814)" fill="#e62e04"
                                                                    stroke="rgba(0,0,0,0)" stroke-miterlimit="10"
                                                                    stroke-width="1" />
                                                            </g>
                                                        </svg></span>

                                                    <div class="ml-3">
                                                        <div class="fs-14">{{ strip_tags($product_query->question) }}</div>
                                                        <span class="text-secondary">{{ $product_query->user->name }} </span>
                                                    </div>
                                                </div>
                                                <div class="answer d-flex my-4">
                                                    <span class="mt-1"> <svg xmlns="http://www.w3.org/2000/svg" width="24.99"
                                                            height="24.98" viewBox="0 0 24.99 24.98">
                                                            <g id="Group_23908" data-name="Group 23908"
                                                                transform="translate(17952.169 11072.5)">
                                                                <path id="Subtraction_89" data-name="Subtraction 89"
                                                                    d="M2162.9-146.2a.4.4,0,0,1-.159-.035.423.423,0,0,1-.251-.446q0-.979,0-1.958V-151.4a5.478,5.478,0,0,1-2.39-.744,5.335,5.335,0,0,1-2.75-4.712c-.034-2.355-.018-4.75,0-7.065l0-.678a5.54,5.54,0,0,1,4.7-5.513,5.639,5.639,0,0,1,.92-.064c2.527,0,5.029,0,7.437,0l5.329,0a5.538,5.538,0,0,1,5.591,5.57c.01,2.708.01,5.224,0,7.692a5.539,5.539,0,0,1-4.843,5.506,6,6,0,0,1-.822.046l-3.234,0c-1.358,0-2.691,0-3.96,0a.556.556,0,0,0-.436.182c-1.173,1.182-2.357,2.367-3.5,3.514l-1.189,1.192-.047.048-.058.059A.462.462,0,0,1,2162.9-146.2Zm5.115-12.835h3.559l.812,2.223h1.149l-3.25-8.494h-.98l-3.244,8.494h1.155l.8-2.222Zm3.226-.915h-2.888l1.441-3.974,1.447,3.972Z"
                                                                    transform="translate(-20109 -10901.815)" fill="#f7941d"
                                                                    stroke="rgba(0,0,0,0)" stroke-miterlimit="10"
                                                                    stroke-width="1" />
                                                            </g>
                                                        </svg></span>

                                                    <div class="ml-3">
                                                        <div class="fs-14">
                                                            {{ strip_tags($product_query->reply ? $product_query->reply : translate('Seller did not respond yet')) }}
                                                        </div>
                                                        <span class=" text-secondary">
                                                            {{ $product_query->product->user->name }} </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                
                                @endif
                            @endauth

                            <div class="pagination-area my-4 mb-0 ml-3">
                                @include('frontend.partials.product_query_pagination')
                            </div>
                        </div>
                    @endif
                    {{-- End of Product Query --}}
                </div>
            </div>
        </div>
    </section>
    <!-- end prodcut suggestion -->

    
    <!-- start prodcut suggestion second-->
    <section class="product-details-content-sugg">
        <div class="container">
            <div class="row gutters-10">
                <div class="col-xl-12 order-0 order-xl-1">
                    <div class="rounded">
                        <div class="p-3">
                            <h3 class="fs-16 fw-600 mb-0">
                                <span class="fs-20 fw-400 mr-4">منتجات تصفحتها مؤخرا</span>
                            </h3>
                        </div>
                        <div class="p-3">
                            <div class="aiz-carousel gutters-5 half-outside-arrow" data-items="5" data-xl-items="3"
                                data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2"
                                data-arrows='true' data-infinite='true'>
                                @foreach (filter_products(\App\Models\Product::where('category_id', $detailedProduct->category_id)->where('id', '!=', $detailedProduct->id))->limit(10)->get() as $key => $related_product)
                                    <div class="carousel-box position-relative">
                                        <div
                                            class="aiz-card-box rounded hov-shadow-md my-2 has-transition">
                                            <div class="mb-3">
                                                <a href="{{ route('product', $related_product->slug) }}"
                                                    class="d-block">
                                                    <img class="img-fit lazyload mx-auto h-327px h-md-327px"
                                                        src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                        data-src="{{ uploaded_asset($related_product->thumbnail_img) }}"
                                                        alt="{{ $related_product->getTranslation('name') }}"
                                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                                </a>
                                            </div>
                                            <div class="card text-left p-2 card-detail-product-sugg">
                                                <h3 class="fs-16 text-truncate-2 lh-1-4 mb-0 h-35px">
                                                    <a href="{{ route('product', $related_product->slug) }}"
                                                        class="d-block text-reset">{{ $related_product->getTranslation('name') }}</a>
                                                </h3>
                                                <div class="fs-15 d-flex justify-content-between align-items-center price">
                                                    <span>عرض خاص</span>
                                                    @if (home_base_price($related_product) != home_discounted_base_price($related_product))
                                                        <del class="fw-600 opacity-50 mr-1">{{ home_base_price($related_product) }}</del>
                                                    @endif
                                                    <span class="fw-700 text-primary">250.00</span>
                                                </div>
                                                @if (addon_is_activated('club_point'))
                                                    <div
                                                        class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
                                                        {{ translate('Club Point') }}:
                                                        <span
                                                            class="fw-700 float-right">{{ $related_product->earn_point }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <a href="">
                                            <div class="icon-favorite d-flex justify-content-center align-items-center">
                                                <i class="fs-20 lar la-heart" style="color: #222222"></i>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    {{-- Product Query --}}
                    @if(get_setting('product_query_activation') == 1)
                        <div class="bg-white rounded shadow-sm mt-3">
                            <div class="border-bottom p-3">
                                <h3 class="fs-18 fw-600 mb-0">
                                    <span>{{ translate(' Product Queries ') }} ({{ $total_query }})</span>
                                </h3>
                            </div>
                            @guest
                                <p class="fs-14 fw-400 mb-0 ml-3 mt-2"><a
                                        href="{{ route('user.login') }}">{{ translate('Login') }}</a> or <a class="mr-1"
                                        href="{{ route('user.registration') }}">{{ translate('Register ') }}</a>{{ translate(' to submit your questions to seller') }}
                                </p>
                            @endguest
                            @auth
                                <div class="query form p-3">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{ route('product-queries.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product" value="{{ $detailedProduct->id }}">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" cols="40" name="question"
                                                placeholder="{{ translate('Write your question here...') }}" style="resize: none;"></textarea>
                                            
                                        </div>
                                        <button type="submit" class="btn btn-primary">{{ translate('Submit') }}</button>
                                    </form>
                                </div>
                                @php
                                    $own_product_queries = Auth::user()->product_queries->where('product_id',$detailedProduct->id);
                                @endphp
                                @if ($own_product_queries->count() > 0)
                                
                                    <div class="question-area my-4   mb-0 ml-3">

                                        <div class="border-bottom py-3">
                                            <h3 class="fs-18 fw-600 mb-0">
                                                <span class="mr-4">{{ translate('My Questions') }}</span>
                                            </h3>
                                        </div>
                                        @foreach ($own_product_queries as $product_query)
                                            <div class="produc-queries border-bottom">
                                                <div class="query d-flex my-4">
                                                    <span class="mt-1"><svg xmlns="http://www.w3.org/2000/svg" width="24.994"
                                                            height="24.981" viewBox="0 0 24.994 24.981">
                                                            <g id="Group_23909" data-name="Group 23909"
                                                                transform="translate(18392.496 11044.037)">
                                                                <path id="Subtraction_90" data-name="Subtraction 90"
                                                                    d="M1830.569-117.742a.4.4,0,0,1-.158-.035.423.423,0,0,1-.252-.446c0-.84,0-1.692,0-2.516v-2.2a5.481,5.481,0,0,1-2.391-.745,5.331,5.331,0,0,1-2.749-4.711c-.034-2.365-.018-4.769,0-7.094l0-.649a5.539,5.539,0,0,1,4.694-5.513,5.842,5.842,0,0,1,.921-.065q3.865,0,7.73,0l5.035,0a5.539,5.539,0,0,1,5.591,5.57c.01,2.577.01,5.166,0,7.693a5.54,5.54,0,0,1-4.842,5.506,6.5,6.5,0,0,1-.823.046l-3.225,0c-1.454,0-2.753,0-3.97,0a.555.555,0,0,0-.435.182c-1.205,1.214-2.435,2.445-3.623,3.636l-.062.062-1.005,1.007-.037.037-.069.069A.464.464,0,0,1,1830.569-117.742Zm7.37-11.235h0l1.914,1.521.817-.754-1.621-1.273a3.517,3.517,0,0,0,1.172-1.487,5.633,5.633,0,0,0,.418-2.267v-.58a5.629,5.629,0,0,0-.448-2.323,3.443,3.443,0,0,0-1.282-1.525,3.538,3.538,0,0,0-1.93-.53,3.473,3.473,0,0,0-1.905.534,3.482,3.482,0,0,0-1.288,1.537,5.582,5.582,0,0,0-.454,2.314v.654a5.405,5.405,0,0,0,.471,2.261,3.492,3.492,0,0,0,1.287,1.5,3.492,3.492,0,0,0,1.9.527,3.911,3.911,0,0,0,.947-.112Zm-.948-.9a2.122,2.122,0,0,1-1.812-.9,4.125,4.125,0,0,1-.652-2.457v-.667a4.008,4.008,0,0,1,.671-2.4,2.118,2.118,0,0,1,1.78-.863,2.138,2.138,0,0,1,1.824.869,4.145,4.145,0,0,1,.639,2.473v.673a4.07,4.07,0,0,1-.655,2.423A2.125,2.125,0,0,1,1836.991-129.881Z"
                                                                    transform="translate(-20217 -10901.814)" fill="#e62e04"
                                                                    stroke="rgba(0,0,0,0)" stroke-miterlimit="10"
                                                                    stroke-width="1" />
                                                            </g>
                                                        </svg></span>

                                                    <div class="ml-3">
                                                        <div class="fs-14">{{ strip_tags($product_query->question) }}</div>
                                                        <span class="text-secondary">{{ $product_query->user->name }} </span>
                                                    </div>
                                                </div>
                                                <div class="answer d-flex my-4">
                                                    <span class="mt-1"> <svg xmlns="http://www.w3.org/2000/svg" width="24.99"
                                                            height="24.98" viewBox="0 0 24.99 24.98">
                                                            <g id="Group_23908" data-name="Group 23908"
                                                                transform="translate(17952.169 11072.5)">
                                                                <path id="Subtraction_89" data-name="Subtraction 89"
                                                                    d="M2162.9-146.2a.4.4,0,0,1-.159-.035.423.423,0,0,1-.251-.446q0-.979,0-1.958V-151.4a5.478,5.478,0,0,1-2.39-.744,5.335,5.335,0,0,1-2.75-4.712c-.034-2.355-.018-4.75,0-7.065l0-.678a5.54,5.54,0,0,1,4.7-5.513,5.639,5.639,0,0,1,.92-.064c2.527,0,5.029,0,7.437,0l5.329,0a5.538,5.538,0,0,1,5.591,5.57c.01,2.708.01,5.224,0,7.692a5.539,5.539,0,0,1-4.843,5.506,6,6,0,0,1-.822.046l-3.234,0c-1.358,0-2.691,0-3.96,0a.556.556,0,0,0-.436.182c-1.173,1.182-2.357,2.367-3.5,3.514l-1.189,1.192-.047.048-.058.059A.462.462,0,0,1,2162.9-146.2Zm5.115-12.835h3.559l.812,2.223h1.149l-3.25-8.494h-.98l-3.244,8.494h1.155l.8-2.222Zm3.226-.915h-2.888l1.441-3.974,1.447,3.972Z"
                                                                    transform="translate(-20109 -10901.815)" fill="#f7941d"
                                                                    stroke="rgba(0,0,0,0)" stroke-miterlimit="10"
                                                                    stroke-width="1" />
                                                            </g>
                                                        </svg></span>

                                                    <div class="ml-3">
                                                        <div class="fs-14">
                                                            {{ strip_tags($product_query->reply ? $product_query->reply : translate('Seller did not respond yet')) }}
                                                        </div>
                                                        <span class=" text-secondary">
                                                            {{ $product_query->product->user->name }} </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                
                                @endif
                            @endauth

                            <div class="pagination-area my-4 mb-0 ml-3">
                                @include('frontend.partials.product_query_pagination')
                            </div>
                        </div>
                    @endif
                    {{-- End of Product Query --}}
                </div>
            </div>
        </div>
    </section>

    <!-- end prodcut suggestion second-->
    <section style="margin-bottom: 60px"></section>
@endsection

@section('modal')
    <div class="modal fade" id="chat_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="modal-header">
                    <h5 class="modal-title fw-600 h5">{{ translate('Any query about this product') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="" action="{{ route('conversations.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $detailedProduct->id }}">
                    <div class="modal-body gry-bg px-3 pt-3">
                        <div class="form-group">
                            <input type="text" class="form-control mb-3" name="title"
                                value="{{ $detailedProduct->name }}" placeholder="{{ translate('Product Name') }}"
                                required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="8" name="message" required
                                placeholder="{{ translate('Your Question') }}">{{ route('product', $detailedProduct->slug) }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary fw-600"
                            data-dismiss="modal">{{ translate('Cancel') }}</button>
                        <button type="submit" class="btn btn-primary fw-600">{{ translate('Send') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" style="display: none !important" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-zoom" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title fw-600">{{ translate('Login') }}</h6>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="p-3">
                        <form class="form-default" role="form" action="{{ route('cart.login.submit') }}"
                            method="POST">
                            @csrf
                            <div class="form-group">
                                @if (addon_is_activated('otp_system'))
                                    <input type="text"
                                        class="form-control h-auto form-control-lg {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        value="{{ old('email') }}" placeholder="{{ translate('Email Or Phone') }}"
                                        name="email" id="email">
                                @else
                                    <input type="email"
                                        class="form-control h-auto form-control-lg {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        value="{{ old('email') }}" placeholder="{{ translate('Email') }}"
                                        name="email">
                                @endif
                                @if (addon_is_activated('otp_system'))
                                    <span class="opacity-60">{{ translate('Use country code before number') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" class="form-control h-auto form-control-lg"
                                    placeholder="{{ translate('Password') }}">
                            </div>

                            <div class="row mb-2">
                                <div class="col-6">
                                    <label class="aiz-checkbox">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span class=opacity-60>{{ translate('Remember Me') }}</span>
                                        <span class="aiz-square-check"></span>
                                    </label>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="{{ route('password.request') }}"
                                        class="text-reset opacity-60 fs-14">{{ translate('Forgot password?') }}</a>
                                </div>
                            </div>

                            <div class="mb-5">
                                <button type="submit"
                                    class="btn btn-primary btn-block fw-600">{{ translate('Login') }}</button>
                            </div>
                        </form>

                        <div class="text-center mb-3">
                            <p class="text-muted mb-0">{{ translate('Dont have an account?') }}</p>
                            <a href="{{ route('user.registration') }}">{{ translate('Register Now') }}</a>
                        </div>
                        @if (get_setting('google_login') == 1 || get_setting('facebook_login') == 1 || get_setting('twitter_login') == 1)
                            <div class="separator mb-3">
                                <span class="bg-white px-3 opacity-60">{{ translate('Or Login With') }}</span>
                            </div>
                            <ul class="list-inline social colored text-center mb-5">
                                @if (get_setting('facebook_login') == 1)
                                    <li class="list-inline-item">
                                        <a href="{{ route('social.login', ['provider' => 'facebook']) }}"
                                            class="facebook">
                                            <i class="lab la-facebook-f"></i>
                                        </a>
                                    </li>
                                @endif
                                @if (get_setting('google_login') == 1)
                                    <li class="list-inline-item">
                                        <a href="{{ route('social.login', ['provider' => 'google']) }}"
                                            class="google">
                                            <i class="lab la-google"></i>
                                        </a>
                                    </li>
                                @endif
                                @if (get_setting('twitter_login') == 1)
                                    <li class="list-inline-item">
                                        <a href="{{ route('social.login', ['provider' => 'twitter']) }}"
                                            class="twitter">
                                            <i class="lab la-twitter"></i>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            getVariantPrice();
        });

        function CopyToClipboard(e) {
            var url = $(e).data('url');
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(url).select();
            try {
                document.execCommand("copy");
                AIZ.plugins.notify('success', '{{ translate('Link copied to clipboard') }}');
            } catch (err) {
                AIZ.plugins.notify('danger', '{{ translate('Oops, unable to copy') }}');
            }
            $temp.remove();
            // if (document.selection) {
            //     var range = document.body.createTextRange();
            //     range.moveToElementText(document.getElementById(containerid));
            //     range.select().createTextRange();
            //     document.execCommand("Copy");

            // } else if (window.getSelection) {
            //     var range = document.createRange();
            //     document.getElementById(containerid).style.display = "block";
            //     range.selectNode(document.getElementById(containerid));
            //     window.getSelection().addRange(range);
            //     document.execCommand("Copy");
            //     document.getElementById(containerid).style.display = "none";

            // }
            // AIZ.plugins.notify('success', 'Copied');
        }

        function show_chat_modal() {
            @if (Auth::check())
                $('#chat_modal').modal('show');
            @else
                $('#login_modal').modal('show');
            @endif
        }

        // Pagination using ajax
        $(window).on('hashchange', function() {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                } else {
                    getQuestions(page);
                }
            }
        });

        $(document).ready(function() {
            $(document).on('click', '.pagination a', function(e) {
                getQuestions($(this).attr('href').split('page=')[1]);
                e.preventDefault();
            });
        });

        function getQuestions(page) {
            $.ajax({
                url: '?page=' + page,
                dataType: 'json',
            }).done(function(data) {
                $('.pagination-area').html(data);
                location.hash = page;
            }).fail(function() {
                alert('Something went worng! Questions could not be loaded.');
            });
        }
        // Pagination end
    </script>
@endsection

@extends('frontend.layouts.app')
@section('content')
<section class="py-3 card-user-panel-content-resp">
    <div class="container card card-user-panel-resp">
        <div class="d-flex align-items-start">
            <div class="col-3 user-side-nav-resp">
                @include('frontend.inc.user_side_nav')
            </div>
			<div class="aiz-user-panel col-9 aiz-user-panel-desktop-resp">
				@yield('panel_content')
            </div>
            <div class="aiz-user-panel col-12 aiz-user-panel-phone-resp">
                <!-- start retour button  -->
                <div class="row title-header title-header-retour" style="margin-bottom: 20px !important">
                    <div class="col-12">
                        <div class="groupe p-3 d-flex justify-content-between bg-white">
                            <a href="" style="color: #222222"><i class="fs-20 las la-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end return button  -->
                <!-- start credit  -->
                <div class="row title-header-credit justify-content-around" style="margin-bottom: 20px !important">
                    <div class="d-flex" style="width:calc(100% / 2 - 15px);color:white;background-color: #35CA4D;">
                        <i class="fs-24 las la-wallet d-flex align-items-center justify-content-center" style="width: 63px; height: 63px; background-color: #2EF14D"></i>
                        <div class="p-2">
                            <p class="mb-0 fs-18 fw-500">0</p>
                            <p class="mb-0">الرصيد المتوفر</p>
                        </div>
                    </div>
                    <div class="d-flex" style="width:calc(100% / 2 - 15px);color:white;background-color: #3BA5E1;">
                        <i class="fs-24 las la-star d-flex align-items-center justify-content-center" style="width: 63px; height: 63px; background-color: #4AB6F3"></i>
                        <div class="p-2">
                            <p class="mb-0 fs-18 fw-500">0</p>
                            <p class="mb-0">الحد الأقصى للرصيد</p>
                        </div>
                    </div>
                </div>
                <!-- end credit  -->
				@yield('panel_content')
            </div>
        </div>
    </div>
</section>
@endsection
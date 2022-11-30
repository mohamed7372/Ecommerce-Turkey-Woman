@extends('frontend.layouts.app')
@section('content')
<section class="py-3 card-user-panel-content-resp">
    <div class="container card card-user-panel-resp">
        <div class="d-flex align-items-start">
            <div class="col-2 user-side-nav-resp">
                @include('frontend.inc.user_side_nav')
            </div>
			<div class="aiz-user-panel col-10 aiz-user-panel-desktop-resp">
				@yield('panel_content')
            </div>
            <div class="aiz-user-panel col-12 aiz-user-panel-phone-resp">
                <!-- start retour button  -->
                <div class="row mb-3 title-header">
                    <div class="col-12">
                        <div class="groupe p-3 d-flex justify-content-between bg-white">
                            <p class="mb-0">اسم المجموعة</p>
                        </div>
                    </div>
                </div>
                <!-- end return button  -->
				@yield('panel_content')
            </div>
        </div>
    </div>
</section>
@endsection
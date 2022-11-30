<!-- <div class="aiz-user-sidenav-wrap position-relative z-1 d-none"> -->
<div class="position-relative z-1">
    <div class="aiz-user-sidenav rounded overflow-auto c-scrollbar-light pb-5 pb-xl-0">
        <div class="sidemnenu mb-3">
            <ul class="aiz-side-nav-list px-2" data-toggle="aiz-side-menu">

                <li class="aiz-side-nav-item">
                    <a href="{{ route('dashboard') }}" class="aiz-side-nav-link {{ areActiveRoutes(['dashboard'])}}">
                        <i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ translate('Dashboard') }}</span>
                    </a>
                </li>
                <!-- start icons side user bar  -->

                <!-- profile settings  -->
                <li class="aiz-side-nav-item">
                    <a href="{{ route('profile') }}" class="aiz-side-nav-link {{ areActiveRoutes(['profile'])}}">
                        <i class="las la-user aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Manage Profile')}}</span>
                    </a>
                </li>
                <!-- orders  -->
                <li class="aiz-side-nav-item">
                    <a href="{{ route('wishlists.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['wishlists.index'])}}">
                        <i class="las la-bags-shopping aiz-side-nav-icon fw-600"></i>
                        <span class="aiz-side-nav-text fw-600">طلباتي</span>
                    </a>
                </li>
                <!-- return order -->
                <li class="aiz-side-nav-item">
                    <a href="{{ route('wishlists.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['wishlists.index'])}}">
                        <i class="las la-box-full aiz-side-nav-icon fw-600"></i>
                        <span class="aiz-side-nav-text fw-600">طلبات الإرجاع</span>
                    </a>
                </li>
                <!-- sell  -->
                <li class="aiz-side-nav-item">
                    <a href="{{ route('wishlists.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['wishlists.index'])}}">
                        <i class="las la-home aiz-side-nav-icon fw-600"></i>
                        <span class="aiz-side-nav-text fw-600">سلة المشتريات</span>
                    </a>
                </li>
                <!-- favorite  -->
                <li class="aiz-side-nav-item">
                    <a href="{{ route('wishlists.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['wishlists.index'])}}">
                        <i class="la la-heart-o aiz-side-nav-icon fw-600"></i>
                        <span class="aiz-side-nav-text fw-600">{{ translate('Wishlist') }}</span>
                    </a>
                </li>
                <!-- notification price  -->
                <li class="aiz-side-nav-item">
                    <a href="{{ route('wishlists.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['wishlists.index'])}}">
                        <i class="las la-siren-on aiz-side-nav-icon fw-600"></i>
                        <span class="aiz-side-nav-text fw-600">قائمة تنبيهات الأسعار</span>
                    </a>
                </li>
                <!-- notification stock  -->
                <li class="aiz-side-nav-item">
                    <a href="{{ route('wishlists.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['wishlists.index'])}}">
                        <i class="las la-bell aiz-side-nav-icon fw-600"></i>
                        <span class="aiz-side-nav-text fw-600">قائمة تنبيهات المخازن</span>
                    </a>
                </li>
                <!-- code promo  -->
                <li class="aiz-side-nav-item">
                    <a href="{{ route('wishlists.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['wishlists.index'])}}">
                        <i class="las la-wallet aiz-side-nav-icon fw-600"></i>
                        <span class="aiz-side-nav-text fw-600">كود الخصم / نقاطي</span>
                    </a>
                </li>
                <!-- credit info  -->
                <li class="aiz-side-nav-item">
                    <a href="{{ route('wishlists.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['wishlists.index'])}}">
                        <i class="las la-wallet aiz-side-nav-icon fw-600"></i>
                        <span class="aiz-side-nav-text fw-600">معلومات الرصيد</span>
                    </a>
                </li>
                <!-- log out  -->
                <li class="aiz-side-nav-item">
                    <a href="{{ route('wishlists.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['wishlists.index'])}}">
                        <i class="las la-sign-out aiz-side-nav-icon fw-600"></i>
                        <span class="aiz-side-nav-text fw-600">تسجيل الخروج</span>
                    </a>
                </li>
                <!-- end icons side user bar  -->
                
            </ul>
        </div>

    </div>

    <div class="fixed-bottom d-xl-none bg-white border-top d-flex justify-content-between px-2" style="box-shadow: 0 -5px 10px rgb(0 0 0 / 10%);">
        <a class="btn btn-sm p-2 d-flex align-items-center" href="{{ route('logout') }}">
            <i class="las la-sign-out-alt fs-18 mr-2"></i>
            <span>{{ translate('Logout') }}</span>
        </a>
        <button class="btn btn-sm p-2 " data-toggle="class-toggle" data-backdrop="static" data-target=".aiz-mobile-side-nav" data-same=".mobile-side-nav-thumb">
            <i class="las la-times la-2x"></i>
        </button>
    </div>
</div>

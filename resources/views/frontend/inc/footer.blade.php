<!-- <section class="bg-white border-top mt-auto">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left text-center p-4 d-block" href="{{ route('terms') }}">
                    <i class="la la-file-text la-3x text-primary mb-2"></i>
                    <h4 class="h6">{{ translate('Terms & conditions') }}</h4>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left text-center p-4 d-block" href="{{ route('returnpolicy') }}">
                    <i class="la la-mail-reply la-3x text-primary mb-2"></i>
                    <h4 class="h6">{{ translate('Return Policy') }}</h4>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left text-center p-4 d-block" href="{{ route('supportpolicy') }}">
                    <i class="la la-support la-3x text-primary mb-2"></i>
                    <h4 class="h6">{{ translate('Support Policy') }}</h4>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left border-right text-center p-4 d-block" href="{{ route('privacypolicy') }}">
                    <i class="las la-exclamation-circle la-3x text-primary mb-2"></i>
                    <h4 class="h6">{{ translate('Privacy Policy') }}</h4>
                </a>
            </div>
        </div>
    </div>
</section> -->


<div id="sponsor">
    <section class="mb-4">
        <div class="container">
            <ul>
                <li>
                    <img src="{{ static_asset('assets/img/sponsor.svg') }}" alt="">
                </li>
                <li>
                    <img src="{{ static_asset('assets/img/sponsor.svg') }}" alt="">
                </li>
                <li>
                    <img src="{{ static_asset('assets/img/sponsor.svg') }}" alt="">
                </li>
                <li>
                    <img src="{{ static_asset('assets/img/sponsor.svg') }}" alt="">
                </li>
                <li>
                    <img src="{{ static_asset('assets/img/sponsor.svg') }}" alt="">
                </li>
                <li>
                    <img src="{{ static_asset('assets/img/sponsor.svg') }}" alt="">
                </li>
                <li>
                    <img src="{{ static_asset('assets/img/sponsor.svg') }}" alt="">
                </li>
            </ul>
        </div>
    </section>   
</div>

<!-- <div class="footer-responsive"> -->
<div class="">
<div style="height:1px; background-color: rgba(204, 204, 204, 0.411); width:100%"></div>

<section class="text-light footer-widget" style="background-color: white !important;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 text-center text-md-left">
                <div class="mt-4">
                    <a href="{{ route('home') }}" class="d-block">
                        @if(get_setting('footer_logo') != null)
                            <img class="lazyload" src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ uploaded_asset(get_setting('footer_logo')) }}" alt="{{ env('APP_NAME') }}" height="44">
                        @else
                            <img class="lazyload" src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ static_asset('assets/img/logo.svg') }}" alt="{{ env('APP_NAME') }}" height="44">
                        @endif
                    </a>
                    <div class="my-3">
                        {!! get_setting('about_us_description',null,App::getLocale()) !!}
                    </div>
                    <div class="d-inline-block d-md-block mb-4">
                        <form class="form-inline" method="POST" action="{{ route('subscribers.store') }}" style="width: 100% !important">
                            @csrf
                            <div class="form-group mb-0 position-relative" style="width: 100%">
                                <input type="email" class="form-control fs-12" placeholder="اكتب ايميلك هنا.." name="email" required
                                        style="border-color: rgba(176, 179, 178, 0.5);color: rgba(176, 179, 178, 1);width:100% !important; padding-left: 80px !important;">
                                <button type="submit" class="btn d-felx align-items-center" style="position: absolute; left:5px; top:5px;background-color: #DE68C9;color: white;height: calc(100% - 10px);">
                                    <p style="margin-top: -5px">
                                    ارسل
                                    </p>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="w-300px mw-100 mx-auto mx-md-0">
                        @if(get_setting('play_store_link') != null)
                            <a href="{{ get_setting('play_store_link') }}" target="_blank" class="d-inline-block mr-3 ml-0">
                                <img src="{{ static_asset('assets/img/play.png') }}" class="mx-100 h-40px">
                            </a>
                        @endif
                        @if(get_setting('app_store_link') != null)
                            <a href="{{ get_setting('app_store_link') }}" target="_blank" class="d-inline-block">
                                <img src="{{ static_asset('assets/img/app.png') }}" class="mx-100 h-40px">
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-lg-2 col-md-2 mr-0">
                <div class="text-center text-md-left mt-4">
                    <h4 class="fs-20 text-uppercase fw-600 pb-2 mb-4" style="color: rgba(34, 34, 34, 1) !important">
                        كيف يمكننا مساعدتك؟
                    </h4>
                    <ul class="list-unstyled">
                        <li class="mb-2 fs-15" style="color: rgba(34, 34, 34, 1)">
                            الصفحة الرئيسية
                        </li>
                        <li class="mb-2 fs-15" style="color: rgba(34, 34, 34, 1)">
                            العضوية
                        </li>
                        <li class="mb-2 fs-15" style="color: rgba(34, 34, 34, 1)">
                            التسوق
                        </li>
                        <li class="mb-2 fs-15" style="color: rgba(34, 34, 34, 1)">
                            الدفع
                        </li>
                        <li class="mb-2 fs-15" style="color: rgba(34, 34, 34, 1)">
                            الإلغاء و الإرجاع
                        </li>   
                        <li class="mb-2 fs-15" style="color: rgba(34, 34, 34, 1)">
                            المتابعة
                        </li>
                        <li class="mb-2 fs-15" style="color: rgba(34, 34, 34, 1)">
                            النقل و التوصيل
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-lg-2 col-md-2">
                <div class="text-center text-md-left mt-4">
                    <h4 class="fs-20 text-uppercase fw-600 pb-2 mb-4" style="color: rgba(34, 34, 34, 1) !important">
                        شركتنا
                    </h4>
                    <ul class="list-unstyled">
                        <li class="mb-2 fs-15" style="color: rgba(34, 34, 34, 1)">
                            عن الشركة
                        </li>
                        <li class="mb-2 fs-15" style="color: rgba(34, 34, 34, 1)">
                            أسواقنا
                        </li>
                        <li class="mb-2 fs-15" style="color: rgba(34, 34, 34, 1)">
                            أسواقنا 
                        </li>
                        <li class="mb-2 fs-15" style="color: rgba(34, 34, 34, 1)">
                            مسؤولية مشتركة
                        </li>
                        <li class="mb-2 fs-15" style="color: rgba(34, 34, 34, 1)">
                            الخصوصية و الأمن
                        </li>   
                        <li class="mb-2 fs-15" style="color: rgba(34, 34, 34, 1)">
                            خدمة الزبائن
                        </li>
                        <li class="mb-2 fs-15" style="color: rgba(34, 34, 34, 1)">
                            أسئلة مكررة
                        </li>
                        <li class="mb-2 fs-15" style="color: rgba(34, 34, 34, 1)">
                            اتصل بنا
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-lg-2 col-md-2">
                <div class="text-center text-md-left mt-4">
                    <h4 class="fs-20 text-uppercase fw-600 pb-2 mb-4" style="color: rgba(34, 34, 34, 1) !important">
                        تابعنا
                    </h4>
                    <ul class="list-unstyled">
                        <li class="mb-2 fs-15 d-flex align-items-center" style="color: rgba(34, 34, 34, 1)">
                            <i class="lab la-facebook-f" style="color: rgba(34, 34, 34, 1); margin-left:5px;"></i>
                            <p class="mb-0">فيسبوك</p>
                        </li>
                        <li class="mb-2 fs-15 d-flex align-items-center" style="color: rgba(34, 34, 34, 1)">
                            <i class="lab la-instagram" style="color: rgba(34, 34, 34, 1); margin-left:5px;"></i>
                            <p class="mb-0">انستجرام</p>
                        </li>
                        <li class="mb-2 fs-15 d-flex align-items-center" style="color: rgba(34, 34, 34, 1)">
                            <i class="lab la-youtube" style="color: rgba(34, 34, 34, 1); margin-left:5px;"></i>
                            <p class="mb-0">يوتيوب</p> 
                        </li>
                        <li class="mb-2 fs-15 d-flex align-items-center" style="color: rgba(34, 34, 34, 1)">
                            <i class="lab la-pinterest-p" style="color: rgba(34, 34, 34, 1); margin-left:5px;"></i>
                            <p class="mb-0">بنترست</p>
                        </li>
                    </ul>
                    <h4 class="fs-20 text-uppercase fw-600 pb-2 mb-4" style="color: rgba(34, 34, 34, 1) !important">
                        تطبيقاتنا
                    </h4>
                    <ul class="list-unstyled">
                        <li class="mb-2 fs-15 d-flex align-items-center" style="color: rgba(34, 34, 34, 1)">
                            <i class="lab la-apple" style="color: rgba(34, 34, 34, 1); margin-left:5px;"></i>
                            <p class="mb-0">أبل بلاي</p>
                        </li>
                        <li class="mb-2 fs-15 d-flex align-items-center" style="color: rgba(34, 34, 34, 1)">
                            <i class="lab la-android" style="color: rgba(34, 34, 34, 1); margin-left:5px;"></i>
                            <p class="mb-0">جوجل بلاي</p>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- <div class="col-md-4 col-lg-2">
                <div class="text-center text-md-left mt-4">
                    <h4 class="fs-13 text-uppercase fw-600 border-bottom border-gray-900 pb-2 mb-4">
                        {{ translate('My Account') }}
                    </h4>
                    <ul class="list-unstyled">
                        @if (Auth::check())
                            <li class="mb-2">
                                <a class="opacity-50 hov-opacity-100 text-reset" href="{{ route('logout') }}">
                                    {{ translate('Logout') }}
                                </a>
                            </li>
                        @else
                            <li class="mb-2">
                                <a class="opacity-50 hov-opacity-100 text-reset" href="{{ route('user.login') }}">
                                    {{ translate('Login') }}
                                </a>
                            </li>
                        @endif
                        <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset" href="{{ route('purchase_history.index') }}">
                                {{ translate('Order History') }}
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset" href="{{ route('wishlists.index') }}">
                                {{ translate('My Wishlist') }}
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset" href="{{ route('orders.track') }}">
                                {{ translate('Track Order') }}
                            </a>
                        </li>
                        @if (addon_is_activated('affiliate_system'))
                            <li class="mb-2">
                                <a class="opacity-50 hov-opacity-100 text-light" href="{{ route('affiliate.apply') }}">{{ translate('Be an affiliate partner')}}</a>
                            </li>
                        @endif
                    </ul>
                </div>
                @if (get_setting('vendor_system_activation') == 1)
                    <div class="text-center text-md-left mt-4">
                        <h4 class="fs-13 text-uppercase fw-600 border-bottom border-gray-900 pb-2 mb-4">
                            {{ translate('Be a Seller') }}
                        </h4>
                        <a href="{{ route('shops.create') }}" class="btn btn-primary btn-sm shadow-md">
                            {{ translate('Apply Now') }}
                        </a>
                    </div>
                @endif
            </div> -->
        </div>
    </div>
</section>

<!-- <hr> -->

<div style="width: 100%; opacity: .1; height: 1px; background-color: #ccc"></div>

<section class="d-flex justify-content-center align-items-center bg-white p-3">
    <p class="copy-right-resp mb-0 fs-20 fw-500">جميع الحقوق محفوظة لصالح أم سي لانو @2022</p>
</section>

<!-- FOOTER -->
<footer class="pt-3 pb-7 pb-xl-3 bg-black text-light d-none">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="text-center text-md-left" current-verison="{{get_setting("current_version")}}">
                    {!! get_setting('frontend_copyright_text',null,App::getLocale()) !!}
                </div>
            </div>
            <div class="col-lg-4">
                @if ( get_setting('show_social_links') )
                <ul class="list-inline my-3 my-md-0 social colored text-center">
                    @if ( get_setting('facebook_link') !=  null )
                    <li class="list-inline-item">
                        <a href="{{ get_setting('facebook_link') }}" target="_blank" class="facebook"><i class="lab la-facebook-f"></i></a>
                    </li>
                    @endif
                    @if ( get_setting('twitter_link') !=  null )
                    <li class="list-inline-item">
                        <a href="{{ get_setting('twitter_link') }}" target="_blank" class="twitter"><i class="lab la-twitter"></i></a>
                    </li>
                    @endif
                    @if ( get_setting('instagram_link') !=  null )
                    <li class="list-inline-item">
                        <a href="{{ get_setting('instagram_link') }}" target="_blank" class="instagram"><i class="lab la-instagram"></i></a>
                    </li>
                    @endif
                    @if ( get_setting('youtube_link') !=  null )
                    <li class="list-inline-item">
                        <a href="{{ get_setting('youtube_link') }}" target="_blank" class="youtube"><i class="lab la-youtube"></i></a>
                    </li>
                    @endif
                    @if ( get_setting('linkedin_link') !=  null )
                    <li class="list-inline-item">
                        <a href="{{ get_setting('linkedin_link') }}" target="_blank" class="linkedin"><i class="lab la-linkedin-in"></i></a>
                    </li>
                    @endif
                </ul>
                @endif
            </div>
            <div class="col-lg-4">
                <div class="text-center text-md-right">
                    <ul class="list-inline mb-0">
                        @if ( get_setting('payment_method_images') !=  null )
                            @foreach (explode(',', get_setting('payment_method_images')) as $key => $value)
                                <li class="list-inline-item">
                                    <img src="{{ uploaded_asset($value) }}" height="30" class="mw-100 h-auto" style="max-height: 30px">
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>

<div class="aiz-mobile-bottom-nav d-xl-none fixed-bottom bg-white shadow-lg border-top rounded-top" style="box-shadow: 0px -1px 10px rgb(0 0 0 / 15%)!important; ">
    <div class="row align-items-center gutters-5">
        <div class="col">
            <a href="{{ route('home') }}" class="text-reset d-block text-center pb-2 pt-3">
                <img src="{{static_asset('assets/icons/home.svg')}}" alt="">
                <span class="d-block fs-10 fw-600 opacity-60 {{ areActiveRoutes(['home'],'opacity-100 fw-600')}}"  style="padding-top: 10px">الرئيسية</span>
            </a>
        </div>
        <div class="col">
            <a href="{{ route('categories.all') }}" class="text-reset d-block text-center pb-2 pt-3">
                <img src="{{static_asset('assets/icons/menu.svg')}}" alt="">
                <span class="d-block fs-10 fw-600 opacity-60 {{ areActiveRoutes(['categories.all'],'opacity-100 fw-600')}}"  style="padding-top: 10px">القائمة</span>
            </a>
        </div>
        <div class="col">
            <a href="{{ route('categories.all') }}" class="text-reset d-block text-center pb-2 pt-3">
                <img src="{{static_asset('assets/icons/favorite.svg')}}" alt="">
                <span class="d-block fs-10 fw-600 opacity-60 {{ areActiveRoutes(['categories.all'],'opacity-100 fw-600')}}"  style="padding-top: 10px">المفضلة</span>
            </a>
        </div>
        <div class="col">
            <a href="{{ route('categories.all') }}" class="text-reset d-block text-center pb-2 pt-3">
                <img src="{{static_asset('assets/icons/user.svg')}}" alt="">
                <span class="d-block fs-10 fw-600 opacity-60 {{ areActiveRoutes(['categories.all'],'opacity-100 fw-600')}}"  style="padding-top: 10px">التسجيل</span>
            </a>
        </div>

        @php
            if(auth()->user() != null) {
                $user_id = Auth::user()->id;
                $cart = \App\Models\Cart::where('user_id', $user_id)->get();
            } else {
                $temp_user_id = Session()->get('temp_user_id');
                if($temp_user_id) {
                    $cart = \App\Models\Cart::where('temp_user_id', $temp_user_id)->get();
                }
            }
        @endphp
        

        <div class="col">
            <a href="{{ route('all-notifications') }}" class="text-reset d-block text-center pb-2 pt-3">
                <span class="d-inline-block position-relative px-2">
                    <i class="fs-24 las la-shopping-basket"></i>
                    @if(Auth::check() && count(Auth::user()->unreadNotifications) > 0)
                        <span class="badge badge-sm badge-dot badge-circle badge-primary position-absolute absolute-top-right" style="right: 7px;top: -2px;"></span>
                    @endif
                </span>
                <span class="d-block fs-10 fw-600 opacity-60 {{ areActiveRoutes(['all-notifications'],'opacity-100 fw-600')}}" style="padding-top: 5px">العربة</span>
            </a>
        </div>
    </div>
</div>
@if (Auth::check() && !isAdmin())
    <div class="aiz-mobile-side-nav collapse-sidebar-wrap sidebar-xl d-xl-none z-1035">
        <div class="overlay dark c-pointer overlay-fixed" data-toggle="class-toggle" data-backdrop="static" data-target=".aiz-mobile-side-nav" data-same=".mobile-side-nav-thumb"></div>
        <div class="collapse-sidebar bg-white">
            @include('frontend.inc.user_side_nav')
        </div>
    </div>
@endif

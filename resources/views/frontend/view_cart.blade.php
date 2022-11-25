@extends('frontend.layouts.app')

@section('content')

    <section class="pt-5 mb-4">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <div class="row aiz-steps arrow-divider">
                        <div class="col active">
                            <div class="text-center text-primary">
                                <i class="la-3x mb-2 las la-shopping-cart"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block">{{ translate('1. My Cart') }}</h3>
                            </div>
                        </div>
                        <div class="col">
                            <div class="text-center">
                                <i class="la-3x mb-2 opacity-50 las la-map"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">{{ translate('2. Shipping info') }}
                                </h3>
                            </div>
                        </div>
                        <div class="col">
                            <div class="text-center">
                                <i class="la-3x mb-2 opacity-50 las la-truck"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">{{ translate('3. Delivery info') }}
                                </h3>
                            </div>
                        </div>
                        <div class="col">
                            <div class="text-center">
                                <i class="la-3x mb-2 opacity-50 las la-credit-card"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">{{ translate('4. Payment') }}</h3>
                            </div>
                        </div>
                        <div class="col">
                            <div class="text-center">
                                <i class="la-3x mb-2 opacity-50 las la-check-circle"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">{{ translate('5. Confirmation') }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-4" id="cart-summary">
        <div class="container">
            @if ($carts && count($carts) > 0)
                <div class="row">
                    <div class="col-9 mx-auto">
                        <!-- start product cart  -->
                        <div class="shadow-sm bg-white rounded text-left" style="padding: 16px 16px 0">
                            <div class="mb-4">
                                <div class="row d-flex justify-content-between mb-3 px-3">
                                    <button type='button' class="fs-18 btn btn-secondary">حذف المحدد</button>
                                    <button type='button' class="fs-18 d-flex align-items-center btn btn-outline-secondary">
                                        <i class="las la-arrow-right"></i>
                                        <p style="margin-right: 10px" class="mb-0">استكمال التسوق</p>
                                    </button>
                                </div>
                                <ul class="list-group list-group-flush" style="list-style: none;">
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($carts as $key => $cartItem)
                                        @php
                                            $product = \App\Models\Product::find($cartItem['product_id']);
                                            $product_stock = $product->stocks->where('variant', $cartItem['variation'])->first();
                                            // $total = $total + ($cartItem['price'] + $cartItem['tax']) * $cartItem['quantity'];
                                            $total = $total + cart_product_price($cartItem, $product, false) * $cartItem['quantity'];
                                            $product_name_with_choice = $product->getTranslation('name');
                                            if ($cartItem['variation'] != null) {
                                                $product_name_with_choice = $product->getTranslation('name') . ' - ' . $cartItem['variation'];
                                            }
                                        @endphp
                                        <li class="px-0">
                                            <div class="card p-3">
                                            <div class="row gutters-5">
                                                <!-- start image and her details  -->
                                                <div class="col-lg-5 d-flex align-items-center">
                                                    <input type="checkbox" name="" id=""
                                                            style="width: 17px; height: 17px;cursor: pointer; border-radius: 0;">
                                                    <!-- start image product  -->
                                                    <span class="mr-3 ml-3">
                                                        <img src="{{ uploaded_asset($product->thumbnail_img) }}"
                                                            style="width: 60px; height: 100px"
                                                            alt="{{ $product->getTranslation('name') }}">
                                                    </span>
                                                    <!-- end image product  -->
                                                    <!-- start info product  -->
                                                    <div class="detail-products">
                                                        <p class="mb-0 fs-14 opacity-60">
                                                            <span>الماركة:</span>
                                                            <span>اسم الماركة</span>
                                                        </p>
                                                        <p class="mb-0 fs-14 opacity-60">{{ $product_name_with_choice }}</p>
                                                        <p class="mb-0 fs-14 opacity-60">
                                                            <span>اللون:</span>
                                                            <span>أسود</span>
                                                        </p>
                                                        <p class="mb-0 fs-14 opacity-60">
                                                            <span>المقاس:</span>
                                                            <span>S</span>
                                                        </p>
                                                        <p class="mb-0 fs-14 opacity-60">
                                                            <span>العرض:</span>
                                                            <span>لايوجد</span>
                                                        </p>
                                                    </div>
                                                    <!-- end info product  -->
                                                </div>
                                                <!-- end image and her details  -->
                                                <!-- start select amount  -->
                                                <div class="col-lg col-6 order-4 order-lg-0 d-flex align-items-center">
                                                    @if ($cartItem['digital'] != 1 && $product->auction_product == 0)
                                                        <div class="row no-gutters align-items-center aiz-plus-minus mr-2 ml-0">
                                                            <p class="mb-0 fs-18 fw-500" style="margin-left: 16px">العدد</p>
                                                            <select class="form-select" 
                                                                style="width: 68px; height: 38px;border: 1px solid #B0B3B2; 
                                                                    border-radius: 4px;cursor: pointer;background-color: rgba(217, 217, 217, 0.2);
                                                                    padding-left: 5px;padding-right: 5px;">
                                                            <!-- <select name="" id="" class="custom-select" style="width: 68px; height: 38px"> -->
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                            </select>
                                                        </div>
                                                    @elseif($product->auction_product == 1)
                                                        <span class="fw-600 fs-16">1</span>
                                                    @endif
                                                </div>
                                                <!-- end select amount  -->
                                                <!-- start price  -->
                                                <div class="col-lg col-4 order-3 order-lg-0 my-3 my-lg-0 d-flex align-items-center">
                                                    <div>
                                                        <p class="mb-0" style="opacity: .5; color:#222222"><del>300.00 ر.س</del></p>
                                                        <p class="mb-0 fs-22" style='color: #DE68C9;'>250.00 ر.س</p>
                                                    </div>
                                                </div>
                                                <!-- end price  -->
                                                <!-- start delete button  -->
                                                <div class="col-lg-auto col-6 order-5 order-lg-0 text-right d-flex align-items-center">
                                                    <a href="javascript:void(0)"
                                                        onclick="removeFromCartView(event, {{ $cartItem['id'] }})"
                                                        class="btn btn-icon">
                                                        <i class="fs-22 las la-times"></i>
                                                    </a>
                                                </div>
                                                <!-- end delete button  -->
                                            </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- end product cart  -->
                        <!-- start last product visit  -->
                        <div class="shadow-sm bg-white rounded text-left" style="padding: 16px 16px 0">
                            <div class="mb-4">
                                <div class="row mb-3 px-3 d-flex align-items-center">
                                    <i style="margin-left: 5px" class="fs-18 lar la-star"></i>
                                    <span class="fs-18">منتجات تصفحتها مؤخرا</span>
                                </div>
                                <ul class="list-group list-group-flush" style="list-style: none;">
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($carts as $key => $cartItem)
                                        @php
                                            $product = \App\Models\Product::find($cartItem['product_id']);
                                            $product_stock = $product->stocks->where('variant', $cartItem['variation'])->first();
                                            // $total = $total + ($cartItem['price'] + $cartItem['tax']) * $cartItem['quantity'];
                                            $total = $total + cart_product_price($cartItem, $product, false) * $cartItem['quantity'];
                                            $product_name_with_choice = $product->getTranslation('name');
                                            if ($cartItem['variation'] != null) {
                                                $product_name_with_choice = $product->getTranslation('name') . ' - ' . $cartItem['variation'];
                                            }
                                        @endphp
                                        <li class="px-0">
                                            <div class="card p-3">
                                            <div class="row gutters-5">
                                                <!-- start image and her details  -->
                                                <div class="col-4 d-flex align-items-center">
                                                    <!-- start image product  -->
                                                    <span class="mr-3 ml-3">
                                                        <img src="{{ uploaded_asset($product->thumbnail_img) }}"
                                                            style="width: 60px; height: 100px"
                                                            alt="{{ $product->getTranslation('name') }}">
                                                    </span>
                                                    <!-- end image product  -->
                                                    <!-- start info product  -->
                                                    <div class="detail-products">
                                                        <p class="mb-0 fs-14 opacity-60">
                                                            <span>الماركة:</span>
                                                            <span>اسم الماركة</span>
                                                        </p>
                                                        <p class="mb-0 fs-14 opacity-60">{{ $product_name_with_choice }}</p>
                                                        <p class="mb-0 fs-14 opacity-60">
                                                            <span>اللون:</span>
                                                            <span>أسود</span>
                                                        </p>
                                                        <p class="mb-0 fs-14 opacity-60">
                                                            <span>المقاس:</span>
                                                            <span>S</span>
                                                        </p>
                                                        <p class="mb-0 fs-14 opacity-60">
                                                            <span>العرض:</span>
                                                            <span>لايوجد</span>
                                                        </p>
                                                    </div>
                                                    <!-- end info product  -->
                                                </div>
                                                <!-- end image and her details  -->
                                                <div class="col-2"></div>
                                                <!-- start price  -->
                                                <div class="col-2 d-flex align-items-center">
                                                    <div>
                                                        <p class="mb-0" style="opacity: .5; color:#222222"><del>300.00 ر.س</del></p>
                                                        <p class="mb-0 fs-22">250.00 ر.س</p>
                                                    </div>
                                                </div>
                                                <!-- end price  -->
                                                <div class="col-2"></div>
                                                <!-- start delete button  -->
                                                <div class="col-2 d-flex align-items-center">
                                                    <a href="" class="btn" style="background-color: #FFD600;border-radius: 4px; width: 100%;">
                                                        اضف للسلة
                                                    </a>
                                                </div>
                                                <!-- end delete button  -->
                                            </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- end last product visit  -->
                    </div>
                    <!-- start total price  -->
                    <div class="col-3  mx-auto">
                        <!-- start prices  -->
                        <div class="card p-3">
                            <div class="fs-18 d-flex justify-content-between" style="color: #222222 !important">
                                <p>قيمة الطلب</p>
                                <p>250.00 ر.س</p>
                            </div>
                            <div class="fs-18 d-flex justify-content-between" style="color: #222222 !important">
                                <p>خصم العرض</p>
                                <p>- 50.00 ر.س</p>
                            </div>
                            <div class="fs-18 d-flex justify-content-between" style="color: #222222 !important">
                                <p>إجمالي السلة</p>
                                <p class="fs-20" style="color: #DE68C9">200.00 ر.س</p>
                            </div>
                            <hr style="opacity:.5">
                            <div class="fs-14 d-flex align-items-center">
                                <i style="color: #DE68C9; margin-left: 5px;" class="fs-20 las la-shipping-fast"></i>
                                <span style="color: #DE68C9; margin-left: 2px;">متوقع التسليم خلال</span>
                                <span> 24 ساعة</span>
                            </div>
                        </div>
                        <!-- end prices  -->
                        <!-- start coupon  -->
                        <div class="card p-3">
                            <p style="color: #222222">كوبون التخفيض</p>
                            <div class="d-flex justify-content-between">
                                <input type="text" 
                                    style="background-color: rgba(217, 217, 217, 0.2);border: 0.7px solid #B0B3B2;width: calc(100% - 90px);height: 38px;">
                                <input type="button" value="Add" class="bg-white"
                                    style="border: 0.7px solid #B0B3B2;width: 80px;height: 38px;">
                            </div>
                        </div>
                        <!-- end coupon  -->
                        <div class="card">
                            <button class="btn fw-500 fs-20" style="background-color: #DE68C9; color: white" >الانتقال للدفع</button>
                        </div>
                    </div>
                    <!-- end total price  -->
                </div>
            @else
                <div class="row">
                    <div class="col-xl-8 mx-auto">
                        <div class="shadow-sm bg-white p-4 rounded">
                            <div class="text-center p-3">
                                <i class="las la-frown la-3x opacity-60 mb-3"></i>
                                <h3 class="h4 fw-700">{{ translate('Your Cart is empty') }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <section class="mb-4 product-details-content-sugg">
        <div class="container">
            <div class="row gutters-10">
                <div class="col-xl-12 order-0 order-xl-1">
                    <div class="rounded">
                        <div class="p-3">
                            <h3 class="fs-16 fw-600 mb-0">
                                <span class="fs-20 fw-400 mr-4">منتجات تكاملية</span>
                            </h3>
                        </div>
                        <div class="p-3">
                            <div class="aiz-carousel gutters-5 half-outside-arrow" data-items="5" data-xl-items="3"
                                    data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2"
                                    data-arrows='true' data-infinite='true'>
                                <div class="carousel-box position-relative">
                                    <div class="aiz-card-box rounded hov-shadow-md my-2 has-transition">
                                        <div class="mb-3">
                                            <a href=""
                                                class="d-block">
                                                <img class="img-fit lazyload mx-auto h-327px h-md-327px"
                                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                    data-src=""
                                                    alt=""
                                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                            </a>
                                        </div>
                                        <div class="card text-left p-2 card-detail-product-sugg">
                                            <h3 class="fs-16 text-truncate-2 lh-1-4 mb-0 h-35px">
                                                <a href=""
                                                    class="d-block text-reset">بنطالون جينز مع بلوزة قطن - سوداء</a>
                                            </h3>
                                            <div class="fs-15 d-flex justify-content-between align-items-center price">
                                                <span>عرض خاص</span>
                                                <span class="fw-700 text-primary">250.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="icon-favorite d-flex justify-content-center align-items-center">
                                        <i class="fs-20 lar la-heart"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-4 product-details-content-sugg">
        <div class="container">
            <div class="row gutters-10">
                <div class="col-xl-12 order-0 order-xl-1">
                    <div class="rounded">
                        <div class="p-3">
                            <h3 class="fs-16 fw-600 mb-0">
                                <span class="fs-20 fw-400 mr-4">منتجات الأكثر مبيعا</span>
                            </h3>
                        </div>
                        <div class="p-3">
                            <div class="aiz-carousel gutters-5 half-outside-arrow" data-items="5" data-xl-items="3"
                                    data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2"
                                    data-arrows='true' data-infinite='true'>
                                <div class="carousel-box position-relative">
                                    <div class="aiz-card-box rounded hov-shadow-md my-2 has-transition">
                                        <div class="mb-3">
                                            <a href=""
                                                class="d-block">
                                                <img class="img-fit lazyload mx-auto h-327px h-md-327px"
                                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                    data-src=""
                                                    alt=""
                                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                            </a>
                                        </div>
                                        <div class="card text-left p-2 card-detail-product-sugg">
                                            <h3 class="fs-16 text-truncate-2 lh-1-4 mb-0 h-35px">
                                                <a href=""
                                                    class="d-block text-reset">بنطالون جينز مع بلوزة قطن - سوداء</a>
                                            </h3>
                                            <div class="fs-15 d-flex justify-content-between align-items-center price">
                                                <span>عرض خاص</span>
                                                <span class="fw-700 text-primary">250.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="icon-favorite d-flex justify-content-center align-items-center">
                                        <i class="fs-20 lar la-heart"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('modal')
    <div class="modal fade" id="login-modal">
        <div class="modal-dialog modal-dialog-zoom">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title fw-600">{{ translate('Login') }}</h6>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="p-3">
                        <form class="form-default" role="form" action="{{ route('cart.login.submit') }}" method="POST">
                            @csrf
                            @if (addon_is_activated('otp_system') && env('DEMO_MODE') != 'On')
                                <div class="form-group phone-form-group mb-1">
                                    <input type="tel" id="phone-code"
                                        class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                        value="{{ old('phone') }}" placeholder="" name="phone" autocomplete="off">
                                </div>

                                <input type="hidden" name="country_code" value="">

                                <div class="form-group email-form-group mb-1 d-none">
                                    <input type="email"
                                        class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        value="{{ old('email') }}" placeholder="{{ translate('Email') }}" name="email"
                                        id="email" autocomplete="off">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group text-right">
                                    <button class="btn btn-link p-0 opacity-50 text-reset" type="button"
                                        onclick="toggleEmailPhone(this)">{{ translate('Use Email Instead') }}</button>
                                </div>
                            @else
                                <div class="form-group">
                                    <input type="email"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        value="{{ old('email') }}" placeholder="{{ translate('Email') }}" name="email"
                                        id="email" autocomplete="off">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            @endif

                            <div class="form-group">
                                <input type="password"
                                    class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    placeholder="{{ translate('Password') }}" name="password" id="password">
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

                    </div>
                    <div class="text-center mb-3">
                        <p class="text-muted mb-0">{{ translate('Dont have an account?') }}</p>
                        <a href="{{ route('user.registration') }}">{{ translate('Register Now') }}</a>
                    </div>
                    @if (get_setting('google_login') == 1 || get_setting('facebook_login') == 1 || get_setting('twitter_login') == 1)
                        <div class="separator mb-3">
                            <span class="bg-white px-3 opacity-60">{{ translate('Or Login With') }}</span>
                        </div>
                        <ul class="list-inline social colored text-center mb-3">
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
@endsection

@section('script')
    <script type="text/javascript">
        function removeFromCartView(e, key) {
            e.preventDefault();
            removeFromCart(key);
        }

        function updateQuantity(key, element) {
            $.post('{{ route('cart.updateQuantity') }}', {
                _token: AIZ.data.csrf,
                id: key,
                quantity: element.value
            }, function(data) {
                updateNavCart(data.nav_cart_view, data.cart_count);
                $('#cart-summary').html(data.cart_view);
            });
        }

        function showCheckoutModal() {
            $('#login-modal').modal();
        }

        // Country Code
        var isPhoneShown = true,
            countryData = window.intlTelInputGlobals.getCountryData(),
            input = document.querySelector("#phone-code");

        for (var i = 0; i < countryData.length; i++) {
            var country = countryData[i];
            if (country.iso2 == 'bd') {
                country.dialCode = '88';
            }
        }

        var iti = intlTelInput(input, {
            separateDialCode: true,
            utilsScript: "{{ static_asset('assets/js/intlTelutils.js') }}?1590403638580",
            onlyCountries: @php echo json_encode(\App\Models\Country::where('status', 1)->pluck('code')->toArray()) @endphp,
            customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
                if (selectedCountryData.iso2 == 'bd') {
                    return "01xxxxxxxxx";
                }
                return selectedCountryPlaceholder;
            }
        });

        var country = iti.getSelectedCountryData();
        $('input[name=country_code]').val(country.dialCode);

        input.addEventListener("countrychange", function(e) {
            // var currentMask = e.currentTarget.placeholder;

            var country = iti.getSelectedCountryData();
            $('input[name=country_code]').val(country.dialCode);

        });

        function toggleEmailPhone(el) {
            if (isPhoneShown) {
                $('.phone-form-group').addClass('d-none');
                $('.email-form-group').removeClass('d-none');
                $('input[name=phone]').val(null);
                isPhoneShown = false;
                $(el).html('{{ translate('Use Phone Instead') }}');
            } else {
                $('.phone-form-group').removeClass('d-none');
                $('.email-form-group').addClass('d-none');
                $('input[name=email]').val(null);
                isPhoneShown = true;
                $(el).html('{{ translate('Use Email Instead') }}');
            }
        }
    </script>
@endsection

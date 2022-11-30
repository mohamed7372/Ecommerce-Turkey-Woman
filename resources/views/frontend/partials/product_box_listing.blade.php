<div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white section-newest-items-box1">
    <div class="position-relative">
        @if(discount_in_percentage($product) > 0)
            <span class="badge-custom">{{ translate('OFF') }}<span class="box ml-1 mr-0">&nbsp;{{discount_in_percentage($product)}}%</span></span>
        @endif
        <div class="position-relative">
            @php
                $product_url = route('product', $product->slug);
                if($product->auction_product == 1) {
                    $product_url = route('auction-product', $product->slug);
                }
            @endphp
            <a href="{{ $product_url }}" class="d-block">
                <img
                    class="img-fit lazyload mx-auto h-261px h-md-461px"
                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                    data-src="{{ uploaded_asset($product->thumbnail_img) }}"
                    alt="{{  $product->getTranslation('name')  }}"
                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                >
            </a>
            @if ($product->wholesale_product)
                <span class="absolute-bottom-left fs-11 text-white fw-600 px-2 lh-1-8" style="background-color: #455a64">
                    {{ translate('Wholesale') }}
                </span>
            @endif
        </div>
        <div class="p-md-3 p-2 text-left title">
            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                <a href="{{ $product_url }}" class="d-block text-reset">{{  $product->getTranslation('name')  }}</a>
            </h3>

            <div class="fs-15 d-flex justify-content-between align-items-center price"
                    style="border: 0.5px solid #2222224b !important;border-radius: 10px;padding: 5px 12px;">
                <span>عرض خاص</span>
                @if (home_base_price($product) != home_discounted_base_price($product))
                    <del class="fw-600 opacity-50 mr-1">{{ home_base_price($product) }}</del>
                @endif
                <span class="fw-700 text-primary" style="color: #DE68C9 !important">250.00</span>
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

        <a href="" style="position:absolute; left:15px; top:15px;">
            <div class="icon-favorite d-flex justify-content-center align-items-center bg-white" style="border-radius: 50px;width: 36px;height: 36px;">
                <i class="fs-20 lar la-heart" style="color: #222222"></i>
            </div>
        </a>
    </div>
</div>

<div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white section-newest-items-box1 section-article-items-box4">
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
        <img
            class="img-fit lazyload mx-auto h-261px h-md-350px"
            src="{{ static_asset('assets/img/placeholder.jpg') }}"
            data-src="{{ uploaded_asset($product->thumbnail_img) }}"
            alt="{{  $product->getTranslation('name')  }}"
            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
        >
        
    </div>
    <a href="">
        <div class="details">
            <p>احفظ ملابسك فترة أطول</p>
            <div class="icon">
                <p>اقراء الأن</p>
                <i class="la la-heart-o la-2x opacity-80"></i>
            </div>
        </div>
    </a>
</div>

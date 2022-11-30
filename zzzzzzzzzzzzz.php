<div class="col-xl-3">
    <div class="aiz-filter-sidebar collapse-sidebar-wrap sidebar-xl sidebar-right z-1035">
        <div class="overlay overlay-fixed dark c-pointer" data-toggle="class-toggle" data-target=".aiz-filter-sidebar" data-same=".filter-sidebar-thumb"></div>
        <div class="collapse-sidebar c-scrollbar-light text-left">
            <div class="d-flex d-xl-none justify-content-between align-items-center pl-3 border-bottom">
                <h3 class="h6 mb-0 fw-600">{{ translate('Filters') }}</h3>
                <button type="button" class="btn btn-sm p-2 filter-sidebar-thumb" data-toggle="class-toggle" data-target=".aiz-filter-sidebar" >
                    <i class="las la-times la-2x"></i>
                </button>
            </div>

            <div class="bg-white shadow-sm rounded mb-3">
                <div class="fs-15 fw-600 p-3 border-bottom">
                    <a href="#" class="dropdown-toggle text-dark filter-section collapsed" data-toggle="collapse">
                        الفئات
                    </a>
                </div>
                <div class="collapse">
                    <div class="p-3  aiz-checkbox-list">
                        <label class="aiz-checkbox">
                            <input
                                type="checkbox"
                                name="selected_attribute_values[]"
                                >
                            <span class="aiz-square-check"></span>
                            <span>وصل حديثا فساتين</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-sm rounded mb-3">
                <div class="fs-15 fw-600 p-3 border-bottom">
                    {{ translate('Price range')}}
                </div>
                <div class="p-3">
                    <div class="aiz-range-slider">
                        <div
                            id="input-slider-range"
                            data-range-value-min="@if(\App\Models\Product::count() < 1) 0 @else {{ \App\Models\Product::min('unit_price') }} @endif"
                            data-range-value-max="@if(\App\Models\Product::count() < 1) 0 @else {{ \App\Models\Product::max('unit_price') }} @endif"
                        ></div>

                        <div class="row mt-2">
                            <div class="col-6">
                                <span class="range-slider-value value-low fs-14 fw-600 opacity-70"
                                    @if (isset($min_price))
                                        data-range-value-low="{{ $min_price }}"
                                    @elseif($products->min('unit_price') > 0)
                                        data-range-value-low="{{ $products->min('unit_price') }}"
                                    @else
                                        data-range-value-low="0"
                                    @endif
                                    id="input-slider-range-value-low"
                                ></span>
                            </div>
                            <div class="col-6 text-right">
                                <span class="range-slider-value value-high fs-14 fw-600 opacity-70"
                                    @if (isset($max_price))
                                        data-range-value-high="{{ $max_price }}"
                                    @elseif($products->max('unit_price') > 0)
                                        data-range-value-high="{{ $products->max('unit_price') }}"
                                    @else
                                        data-range-value-high="0"
                                    @endif
                                    id="input-slider-range-value-high"
                                ></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <button type="submit" class="btn btn-styled btn-block btn-base-4">Apply filter</button> --}}
        </div>
    </div>
</div>
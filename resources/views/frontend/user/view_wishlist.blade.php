@extends('frontend.layouts.user_panel')

@section('panel_content')
    <div class="row mb-3 title-header">
        <div class="col-12">
            <p class="p-3 mb-0 favorite-wishlist-resp" style="background-color: #DE68C9; color:white">المفضلة</p>
            <div class="groupe p-3 d-flex justify-content-between bg-white">
                <p class="mb-0">اسم المجموعة</p>
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center pl-4" style="color: #DE68C9;">
                        <i class="fs-22 las la-pen pr-2"></i>
                        <p class="mb-0">تعديل</p>
                    </div>
                    <i class="fs-20 las la-times"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="row gutters-5">
        @forelse ($wishlists as $key => $wishlist)
            @if ($wishlist->product != null)
                <!-- <div class="col-xxl-3 col-xl-4 col-lg-3 col-md-4 col-sm-6" id="wishlist_{{ $wishlist->id }}"> -->
                <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-12 col-sm-12" id="wishlist_{{ $wishlist->id }}">
                    <div class="card mb-2 shadow-sm">
                        <div class="card-body d-flex">
                            <a href="{{ route('product', $wishlist->product->slug) }}" class="d-block col-3 p-0">
                                <img src="{{ uploaded_asset($wishlist->product->thumbnail_img) }}" class="img-fit" style="width: 100%; height: 100%">
                            </a>

                            <div class="details pr-3 col-9">
                                <h5 class="fs-16 mb-0 lh-1-5 fw-600 text-truncate-2">
                                    <a href="{{ route('product', $wishlist->product->slug) }}" class="text-reset">{{ $wishlist->product->getTranslation('name') }}</a>
                                </h5>
                                <p class="fs-16"><span>رقم الستوك:</span> <span>BCW450TRK0002100</span></p>
                                <div class="d-flex">
                                    <p class="fs-18"><span>اللون:</span> <span>أزرق</span></p>
                                    <p class="fs-18">|</p>
                                    <p class="fs-18"><span>المقاس:</span> <span>S</span></p>
                                </div>
                                <p><del>300.00 ر.س</del></p>
                                <p class="fs-20" style="color:#DE68C9">250.00 ر.س</p>

                                <div class="btns d-flex justify-content-between">
                                    <button type="button" class="btn" style="width: 130px !important; background-color: #DE68C9 !important;color: white;" onclick="showAddToCartModal({{ $wishlist->product->id }})">
                                        {{ translate('Add to cart')}}
                                    </button>
                                    <button href="#" class="d-flex align-items-center" data-toggle="tooltip" 
                                        data-placement="top" title="Remove from wishlist" 
                                        onclick="removeFromWishlist({{ $wishlist->id }})"
                                        style="width:calc(100% - 138px) !important;font-size:16px;background-color: #F9F9F9;border: 0.7px solid #B0B3B2;border-radius: 2px;color: #222222;">
                                        <div class="icon d-flex align-items-center justify-content-center pl-2"  style="border-left: 0.7px solid #B0B3B2;height: 100%;">
                                            <i class="fs-20 las la-times"></i>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center" style="width: 100%;">
                                            <p class="mb-0 ">حذف من المفضلة</p>
                                        </div>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endif
        @empty
            <div class="col">
                <div class="text-center bg-white p-4 rounded shadow">
                    <img class="mw-100 h-200px" src="{{ static_asset('assets/img/nothing.svg') }}" alt="Image">
                    <h5 class="mb-0 h5 mt-3">{{ translate("There isn't anything added yet")}}</h5>
                </div>
            </div>
        @endforelse
    </div>
    <div class="aiz-pagination">
        {{ $wishlists->links() }}
    </div>
@endsection

@section('modal')

<div class="modal fade" id="addToCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
        <div class="modal-content position-relative">
            <div class="c-preloader">
                <i class="fa fa-spin fa-spinner"></i>
            </div>
            <button type="button" class="close absolute-close-btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div id="addToCart-modal-body">

            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script type="text/javascript">
        function removeFromWishlist(id){
            $.post('{{ route('wishlists.remove') }}',{_token:'{{ csrf_token() }}', id:id}, function(data){
                $('#wishlist').html(data);
                $('#wishlist_'+id).hide();
                AIZ.plugins.notify('success', '{{ translate('Item has been renoved from wishlist') }}');
            })
        }
    </script>
@endsection

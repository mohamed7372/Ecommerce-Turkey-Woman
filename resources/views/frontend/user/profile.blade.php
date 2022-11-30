@extends('frontend.layouts.user_panel')

@section('panel_content')
    <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Basic Info-->
        <div>
            <div class="card-body">
                <div class="form row form-profil-user-custom">
                    <div class="col-6">
                        <div class="form-group row d-flex align-items-center">
                            <label class="col-md-3 col-form-label">الأسم الأول *</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="محمد" name="first-name" value="{{ Auth::user()->name }}">
                            </div>
                        </div>

                        <div class="form-group row d-flex align-items-center">
                            <label class="col-md-3 col-form-label">الأسم الأخير *</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="مادوو" name="last-name" value="{{ Auth::user()->name }}">
                            </div>
                        </div>

                        <div class="form-group row d-flex align-items-center">
                            <label class="col-md-3 col-form-label">رقم الجوال *</label>
                            <div class="col-md-9 position-relative">
                                <select class="form-control form-select form-select-lg" aria-label=".form-select-lg example">
                                    <option selected>تركيا</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <div class="flag" style="position: absolute; left:45px; top:9px; height: calc(100%-20px)">
                                    <img style="width: 38px; height: 100%" class="img-fit" src="{{ static_asset('assets/img/bg.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row d-flex align-items-center">
                            <label class="col-md-3 col-form-label">الإيميل *</label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" placeholder="mado@email.com" name="email" value="{{ Auth::user()->phone }}">
                            </div>
                        </div>

                        <div class="form-group row d-flex align-items-center">
                            <label class="col-md-3 col-form-label">الجنس *</label>
                            <div class="col-md-9 d-flex align-items-center">
                                <input type="radio" name="gender" id="" checked>
                                <label class="col-3 col-form-label">ذكر</label>
                                <input type="radio" name="gender" id="">
                                <label class="col-3 col-form-label">انثى</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group row d-flex align-items-center">
                            <label class="col-md-3 col-form-label">الدولة</label>
                            <div class="col-md-9">
                                <select class="form-control form-select form-select-lg" aria-label=".form-select-lg example">
                                    <option selected>تركيا</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row d-flex align-items-center">
                            <label class="col-md-3 col-form-label">العنوان</label>
                            <div class="col-md-9 d-flex justify-content-between">
                                <select class="form-control form-select form-select-lg" aria-label=".form-select-lg example" style="width: calc(100% / 2 - 8px)">
                                    <option selected>اختر المدينة</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <select class="form-control form-select form-select-lg" aria-label=".form-select-lg example" style="width: calc(100% / 2 - 8px)">
                                    <option selected>اختر الإقليم</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row d-flex align-items-center">
                            <label class="col-md-3 col-form-label">المستوى التعليمي</label>
                            <div class="col-md-9">
                                <select class="form-control form-select form-select-lg" aria-label=".form-select-lg example">
                                    <option selected>اختر</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row d-flex align-items-center">
                            <label class="col-md-3 col-form-label">الوظيفة</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="مادوو" name="last-name" value="{{ Auth::user()->name }}">
                            </div>
                        </div>

                        <div class="form-group row d-flex align-items-center">
                            <label class="col-md-3 col-form-label">تاريخ الميلاد</label>
                            <div class="col-md-9 d-flex justify-content-between">
                                <select class="form-control" aria-label=".form-select-lg example" style="width: calc(100% / 3 - 8px)">
                                    <option selected>1</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <select class="form-control" aria-label=".form-select-lg example" style="width: calc(100% / 3 - 8px)">
                                    <option selected>مايو</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <select class="form-control" aria-label=".form-select-lg example" style="width: calc(100% / 3 - 8px)">
                                    <option selected>1980</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row d-flex align-items-center">
                            <input type="radio" name="s" id="" checked style="margin-left: 10px">
                            <label class="col-form-label">ذهذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم.</label>
                        </div>

                        <div class="form-group row d-flex align-items-center">
                            <input type="radio" name="s" id="" checked style="margin-left: 10px">
                            <label class="col-form-label">ذهذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم.</label>
                        </div>

                        <div class="form-group row text-right">
                            <div class="col-8"></div>
                            <div class="col-3">
                                <button type="submit" class="btn fs-24"
                                    style="background-color: #DE68C9; border-radius: 4px; color: white;padding:10px 38px">
                                        حفظ
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
              
            </div>
        </div>
    </form>

    <br>

@endsection

@section('modal')
    @include('frontend.partials.address_modal')
@endsection

@section('script')
    <script type="text/javascript">
        
        $('.new-email-verification').on('click', function() {
            $(this).find('.loading').removeClass('d-none');
            $(this).find('.default').addClass('d-none');
            var email = $("input[name=email]").val();

            $.post('{{ route('user.new.verify') }}', {_token:'{{ csrf_token() }}', email: email}, function(data){
                data = JSON.parse(data);
                $('.default').removeClass('d-none');
                $('.loading').addClass('d-none');
                if(data.status == 2)
                    AIZ.plugins.notify('warning', data.message);
                else if(data.status == 1)
                    AIZ.plugins.notify('success', data.message);
                else
                    AIZ.plugins.notify('danger', data.message);
            });
        });
    </script>

    @if (get_setting('google_map') == 1)
        
        @include('frontend.partials.google_map')
        
    @endif

@endsection

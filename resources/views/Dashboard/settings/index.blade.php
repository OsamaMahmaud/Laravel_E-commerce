@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('title')
الاعدادات
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">إعدادت الموقع</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    الاعدادات  </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection


@section('content')
        <!-- Container-fluid Ends-->

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row product-adding">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>الاعدادات</h5>
                        </div>
                        <div class="card-body">
                            <div class="digital-add needs-validation">
                                <form action="{{ route('dashboard.settings.update', $setting->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method( 'put' )


                                    @if ($errors->any())
                                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                                    @endif

                                    <div class="form-group">

                                        <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                                        <label for="validationCustom05" class="col-form-label pt-0">
                                            لوجو الموقع</label>

                                        <input class="form-control dropify" data-default-file="{{ asset($setting->logo) }}" id="validationCustom05" type="file" name="logo">

                                    </div>


                                    <div class="form-group">

                                        <label class="col-form-label">الصورة المصغرة</label>

                                        <input class="form-control dropify"  data-default-file="{{ asset($setting->favicon) }}" id="validationCustom05" type="file" name="favicon">
                                    </div>



                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0"><span>*</span>
                                            اسم الموقع</label>
                                        <input class="form-control" id="validationCustom01" type="text" name="name"
                                            value="{{ $setting->name }}">
                                    </div>


                                    <div class="row">
                                        <div class="col">
                                            <label for="exampleTextarea">وصف الموقع</label>
                                            <textarea class="form-control" id="exampleTextarea" name="description" rows="3">{{ $setting->twitter }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustom02" class="col-form-label"><span>*</span>
                                            البريد الإلكتروني </label>
                                        <input class="form-control" id="validationCustom02" type="text" name="email"
                                            value="{{ $setting->email }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0">رقم الهاتف</label>
                                        <input class="form-control" id="validationCustomtitle" type="text" name="phone"
                                            value="{{ $setting->phone }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0">العنوان</label>
                                        <input class="form-control" id="validationCustomtitle" type="text" name="address"
                                            value="{{ $setting->address }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0">رابط الفيس
                                            بوك</label>
                                        <input class="form-control" id="validationCustomtitle" type="text"
                                            name="facebook" value="{{ $setting->facebook }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0">رابط تويتر</label>
                                        <input class="form-control" id="validationCustomtitle" type="text" name="twitter"
                                            value="{{ $setting->twitter }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0">حساب
                                            الانستجرام</label>
                                        <input class="form-control" id="validationCustomtitle" type="text"
                                            name="instagram" value="{{ $setting->instagram }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0"> اليوتيوب</label>
                                        <input class="form-control" id="validationCustomtitle" type="text"
                                            name="youtube" value="{{ $setting->youtube }}">
                                    </div>


                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0">التيك توك</label>
                                        <input class="form-control" id="validationCustomtitle" type="text"
                                            name="tiktok" value="{{ $setting->tiktok }}">
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">حفظ</button>
                                    </div>


                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection

@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
@endsection

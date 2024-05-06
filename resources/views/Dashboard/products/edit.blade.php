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
    <!--Internal   Notify -->
    <link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

@endsection
@section('title')
تعديل المنتج
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> المنتجات </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تعديل قسم  </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection


@section('content')
    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            {{-- <h3>{{/*$product->name*/}} --}}
                            </h3>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">



                        </div>

                        <div class="card-body">

                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="table-responsive table-desi">
                                    <form class="needs-validation"
                                        action= "{{route('products.update',$product->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="form">
                                            @csrf
                                            @method('put')
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">اسم المنتج</label>
                                                <input type="text" class="form-control" id="product_name" name="name" value="{{ $product->name }}">
                                                @error('name')
                                                <small class="form-text text-danger">{{$message}}</small>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                                                <label for="exampleInputEmail1">الوصف </label>
                                                <input type="text" class="form-control" id="description" name="description" value="{{ $product->description }}">
                                                @error('description')
                                                <small class="form-text text-danger">{{$message}}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">الصورة</label>
                                                <input class="form-control dropify" id="validationCustom02" type="file"
                                                  name="image" value="{{$product->image}}">
                                                <div>
                                                  <img alt="{{ $product->name }}" src="{{asset('images/products/'.$product->image)}}" width="20%">

                                                </div>
                                                @error('image')
                                                <small class="form-text text-danger">{{$message}}</small>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                                                <label for="exampleInputEmail1">السعر </label>
                                                <input type="text" class="form-control" id="price" name="price" value="{{$product->price}}">
                                                @error('price')
                                                <small class="form-text text-danger">{{$message}}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">الخصم </label>
                                                <input type="text" class="form-control" id="discount_price" name="discount_price" value="{{$product->discount_price}}">
                                                @error('discount_price')
                                                <small class="form-text text-danger">{{$message}}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">الكميه </label>
                                                <input type="text" class="form-control" id="quantity" name="quantity" value="{{$product->quantity}}">
                                                @error('quantity')
                                                <small class="form-text text-danger">{{$message}}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="validationCustomtitle" class="col-form-label pt-0">القسم</label>
                                                <select name="category_id" id="" class="form-control" required>
                                                    <option value="">اختر القسم</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            @if($category->id == $product->category_id) selected @endif>
                                                            {{ $category->name }}</option>
                                                    @foreach ($category->chiled as $child)
                                                        <option value="{{ $child->id }}"
                                                            @if($child->id == $product->category_id) selected @endif>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;{{ $child->name }}</option>
                                                    @endforeach
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="validationCustom05" class="col-form-label pt-0">
                                                صور المنتج</label>
                                                <input class="form-control dropify" id="validationCustom05" type="file"
                                                    name="images[]" multiple="multiple">

                                                </div>

                                            </div>



                                                @foreach ($product->images as $image)
                                                     <div>
                                                        <img alt='dd'  src="{{asset('images/products/'.$image->image)}}" width="20%">

                                                     </div>

                                                @endforeach







                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">تاكيد</button>
                                                <a class="btn btn-lg btn-primary m-1" href="{{ route('products.index' )}}">رجوع</a>

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
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<!-- Internal Modal js-->
<script src="{{URL::asset('assets/js/modal.js')}}"></script>

<!--Internal  Notify js -->
<script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>

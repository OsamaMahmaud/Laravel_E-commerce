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
الاعدادات
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> أقسام المنتجات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    اضافة قسم  </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection


@section('content')
        <!-- Container-fluid Ends-->


            @if (session()->has('success'))
            <script>
                window.onload = function() {
                    notif({
                        msg: "Category has been deleted",
                        type: "success"
                    })
                }

            </script>
            @endif


            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li  style="display: block;"> * {{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row product-adding">
                  <!--div-->
					<div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">

                                    <div class="col-sm-6 col-md-4 col-xl-3">
										<a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">اضافه منتج</a>
									</div>

								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example1" class="table key-buttons text-md-nowrap " data-page-length='50'>
										<thead>
											<tr>
												<th class="borde-0">#</th>
												<th>الإسم</th>
                                                {{-- <th>الصورة</th> --}}
                                                <th> نوع القسم </th>
                                                <th>العمليات </th>

											</tr>
										</thead>
										<tbody>
                                             <?php  $i=0 ?>
                                             @foreach($categorys as $category)
                                                <tr>
                                                    <?php $i++ ?>
                                                    <td>{{$i}}</td>
                                                    <td>{{ $category->name }}</td>
                                                    {{-- <td>{{ $category->image }}</td> --}}
                                                    <td>
                                                        @if( $category->parent )
                                                          <span class="text-warning">{{ $category->parent->name }} </span>
                                                        @else
                                                           <span class="text-success">قسم رئيسي</span>
                                                        @endif

                                                    <td>

                                                         <a href="{{ route('Categories.edit', $category->id) }}" class="btn btn-sm btn-primary m-1" title="تعديل"><i class="text-sucess las la-pen"></i></a>

                                                         <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                            data-id="{{$category->id}}"
                                                            data-category_name="{{$category->name}}"
                                                            data-toggle="modal" href="#modaldemo9" title="حذف"><i
                                                                class="las la-trash"></i>
                                                         </a>
                                                    </td>

                                                </tr>
                                             @endforeach

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!--/div-->
                      <!-- Modal effects -->
                      <div class="modal" id="modaldemo8">
                        <div class="modal-dialog modal-dialog-centered" role="document">

                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">Modal Header</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('Categories.store') }}" method="post">
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">اسم القسم</label>
                                            <input type="text" class="form-control" id="category_name" name="name">
                                            @error('name')
                                            <small class="form-text text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">القسم الرئيسي </label>
                                        <select name="parent_id" id="parent_id" class="custom-select my-1 mr-sm-2" >
                                            <option value="">القسم الرئيسي </option>
                                            @foreach ($mainCategories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                        </select>

                                        {{-- <div class="form-group">
                                            <label for="exampleFormControlTextarea1">الصورة</label>
                                            <input class="form-control dropify" id="validationCustom02" type="file"
                                              name="image">
                                            @error('image')
                                            <small class="form-text text-danger">{{$message}}</small>
                                            @enderror
                                        </div> --}}

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">تاكيد</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>

                                        </div>
                                    </form>

                                </div>
                             </div>
                        </div>
                      </div>
                    <!-- End Modal effects-->

                    <!-- edit -->
                        <div class="modal fade" id="edit_Product"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">تعديل القسم</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="products/update" method="post" autocomplete="off">
                                        {{ method_field('patch') }}
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="hidden" name="id" id="id" value="">
                                            <label for="recipient-name" class="col-form-label">اسم القسم:</label>
                                            <input class="form-control" name="category_name" id="category_name" type="text">
                                        </div>

                                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">القسم</label>
                                        <select name="main_category" id="main_category" class="custom-select my-1 mr-sm-2" required>
                                            <option value=""
                                                            @if ($category->parent_id == null || $category->parent_id == 0) selected @endif>قسم رئيسي
                                                        </option>
                                            @foreach ($mainCategories as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $category->parent_id) selected @endif>
                                                {{ $item->name }}</option>
                                            @endforeach
                                        </select>

                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">الصورة</label>
                                            <input class="form-control dropify" id="category_image" type="file"
                                              name="image">
                                            @error('image')
                                            <small class="form-text text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">تاكيد</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>



 <!-- delete -->
                        <div class="modal" id="modaldemo9">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">حذف القسم</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                            type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form action="Categories/destroy" method="post">
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                            <input type="hidden" name="id" id="id" value="">
                                            <input class="form-control" name="category_name" id="category_name" type="text" readonly>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                            <button type="submit" class="btn btn-danger">تاكيد</button>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>



			        	</div>
				<!-- /row -->

			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
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

<!-- edit Modal js-->
<script>
    $('#edit_Product').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var category_name = button.data('category_name')
        var section_name = button.data('category_name')
        var description = button.data('category_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #category_name').val(category_name);
        modal.find('.modal-body #section_name').val(section_name);
        modal.find('.modal-body #description').val(description);
    })
</script>

<!-- delete Modal js-->
<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var category_name = button.data('category_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #category_name').val(category_name);
    })
</script>
@endsection



@include('admin.includes.header')
<link href="{{ asset('public/assets/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">


        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('admin.includes.nav')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-6 d-flex no-block align-items-center">
                        <h4 class="page-title">Manage Images</h4>
                    </div>
					<div class="col-6">
                     @if(Session::has('message'))
                    <div class="alert alert-success">
                        <strong>Success!</strong> {{ Session::get('message') }}
                    </div>
                    @endif
                    @if(Session::has('error_message'))
                    <div class="alert alert-danger">
                        <strong>Danger!</strong> {{ Session::get('error_message') }}
                    </div>
                    @endif
                 </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

              <div class="card">

                            <div class="card-body">
                                <h5 class="card-title">
								<?php if(isset($permision)){
									if($permision->add_permision == 1){ ?>
                                    <a href="{{url('secure-admin/add-images')}}"><button type="button" class="btn btn-primary">Add Images</button></a>
								<?php } } ?>
                                </h5>
                               <!-- <div class="col-md-2" style="padding-bottom: 10px;">
                                        <select class="select2 form-select shadow-none"
                                                style="width: 100%; height:36px;" id="changelang">
                                            <option>Select Language</option>
                                                <option value="en">English</option>
                                                <option value="hn">Hindi</option>
                                        </select>
                                </div>-->
                                <div class="table-responsive">
                                  <input type="hidden" name="_token" id="csrf" value="{{ csrf_token() }}">
                                    <table id="images" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Title</th>
												<th>Images</th>
                                                <th>Status</th>
                                              <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php if(isset($permision)){
											if($permision->view_permision == 1){ ?>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @if(isset($list))
                                        @foreach($list as $listdata)
                                            <tr>
                                                <td>{{$i}}</td>
                                               <td>{{$listdata->title}}</td>
												<td>
												<?php 							
												
												if($listdata->filename !=NULL && file_exists('public/uploads/images/'.$listdata->filename)){	
													?>												
                                                     <img src="{{ asset('/public/uploads/images/'.$listdata->filename)}}" height="80px" width="80px"/> 
                                                
												<?php  } ?>
												</td>
												
												
												
												</td>
                                                  <td>
                                                    <?php if($listdata->status == 1) { ?>
                                                    <a href=""><span class="badge rounded-pill bg-success">Active</span></a>
                                                    <?php }else{ ?>
                                                    <a href=""><span class="badge rounded-pill bg-danger">In-active</span></a>
                                                    <?php } ?>
                                                </td>
                                                <td>
						<?php if($permision->edit_permision == 1){ ?>
                        <a class="btn btn-info btn-sm" href="{{url('secure-admin/edit-images/')}}/{{encode5t($listdata->id)}}"><i class="fas fa-pencil-alt"></i>Edit</a>
						<?php }?>
						<?php if($permision->delete_permision == 1){ ?>
                        <a class="btn btn-danger btn-sm deletebtn" href="javascript:void(0);" value="{{encode5t($listdata->id)}}"><i class="fas fa-trash"></i>Delete</a>
						<?php }?>
                     </td>
                                            </tr>
                                        @php $i++; @endphp
                                        @endforeach
                                        @endif
											<?php } }?>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>

            </div>

@include('admin.includes.footer')
<script src="{{ asset('public/assets/admin/assets/extra-libs/multicheck/datatable-checkbox-init.js')}}"></script>
    <script src="{{ asset('public/assets/admin/assets/extra-libs/multicheck/jquery.multicheck.js')}}"></script>
    <script src="{{ asset('public/assets/admin/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
    $('#images').DataTable();

$(document).on("click",".deletebtn",function(e){
     if(!confirm("Do you really want to delete record?")) {
        return false;
      }
     e.preventDefault();
     var id = $(this).attr("value");
     var token = $("#csrf").val();

     $.ajax(
         {
           url: baseurl+'delete-images', //or you can use url: "company/"+id,
           type: 'POST',
           data: {
             _token: token,
                 id: id,
                 table:'images'
         },
         success: function (response){
            if(response.success == true){
            location.reload();
            }
              //location.reload();
          }
      });
       return false;
    });
</script>

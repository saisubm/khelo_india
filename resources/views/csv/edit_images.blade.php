@include('admin.includes.header')
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
                        <h4 class="page-title">Edit New Image</h4>
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
                                <ul class="nav nav-tabs" role="tablist">
                                   <!-- <li class="nav-item">
                                        <a id="en" class="nav-link active" data-toggle="tab" href="javascript:void(0)" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Download</span></a>
                                    </li>-->
                                </ul>
                            <!-- Tab panes -->
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="english" role="tabpanel">
                                   <div class="card">
                                       <form name="tenderenglish" autocomplete="off" id="AudioFormEdit" method="post" enctype="multipart/form-data" action="{{ url('/') }}/secure-admin/update-images/{{encode5t($images_edit->id)}}">
                                           @csrf                                                                                    
                                           <input type="hidden" name="language" value="en"/>
                            <div class="card-body">

							<div class="row">
                <div class="col-md-12">
                      <div class="form-group">
                         <label>Title</label>
                         <input type="text" name="title" id="title" class="form-control" value="<?php echo $images_edit->title; ?>" placeholder="Title" >
                         <span class="text-danger">{{ $errors->first('title') }}</span>
                      </div>
                   </div>
                   <div class="col-md-12">
                         <div class="form-group">
                            <label>Images</label>
                            <input type="file" class="form-control"  name="images"> 
							<input type="hidden" class="form-control"  name="updated_images" value="<?php echo $images_edit->filename; ?>"> 							
							<?php 
												if($images_edit->filename !=NULL && file_exists('public/uploads/images/'.$images_edit->filename)){	
													?>												
                                                     <img src="{{ asset('/public/uploads/images/'.$images_edit->filename)}}" height="80px" width="80px"/> 
                                                
							<?php  } ?>	
							<span class="text-danger">{{ $errors->first('images') }}</span>
                         </div>
						 
                    </div>                  
			    <div class="border-tops">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
             </div>
            </div>
							 </form>
                                   </div>
                                </div>


                               </div>
                            </div>




            </div>
@include('admin.includes.footer')



@include('includes.header')
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
                        <h4 class="page-title">Add New Csv File</h4>
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
                                       <form name="tenderenglish" id="StaticContentFormAdd" autocomplete="off" id="tenderenglish" method="post" enctype="multipart/form-data" action="{{url('save-csv')}}">
                                           @csrf
                                           <input type="hidden" name="language" value="en"/>
                            <div class="card-body">

			<div class="row">                 
                    <div class="col-md-12">
                      <div class="form-group">
                         <label>Images</label>
                         <input type="file" name="file" id="file" class="form-control"/>
                         <span class="text-danger">{{ $errors->first('csv_files') }}</span>
                      </div>
                   </div>
			    <div class="border-tops">
                    <div class="card-body">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
							 </form>
                                   </div>
                                </div>


                               </div>
                            </div>




            </div>
            @include('includes.footer')




@extends('layouts.default_new')
@section('content')

   <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Upload PDF</a>

                                <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#nav-home1" role="tab" aria-controls="nav-home1" aria-selected="true">View PDF Details</a>
                           
                                    
                            </div>
                           
                        </nav>
<div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

<br/>                              
<h4>Upload PDF</h4>
<form id='form'>
 <h5> PDF:</h5>

<input type="file" name="file" >
<br/><br/>
<div></div>
<h5>Image Coordinates:</h5>
<table class="table" border="0" id='image_tbl'>
  <thead>
    <tr><th>Sl No</th><th>Name</th><th>Width</th><th>Height</th><th>Page#</th><th>Action</th></tr>

<tr><th></th><th><input type='text'/></th><th><input type='text'/></th><th><input type='text'/></th><th><input type='text'/></th><th><button class='btn btn-primary' id="add">Add</button></th></tr>

  </thead>
<tbody></tbody>

</table>
<!-- Width(cm):<input type='text' name="width"/>
<br/><br/>  
Height(cm):<input type='text' name="height"/>
<br/><br/>
Page No:<input type='text' name="page_no"/>
<br/><br/> -->
<button class='btn btn-primary' id='upload'>Save All</button>

</form>

    
                            </div>
                            <div class="tab-pane fade" id="nav-home1" role="tabpanel" aria-labelledby="nav-profile-tab">
<h4>Vew Details</h4>
<table class='table' id='table3' style="width:100%">
  <thead>
    <tr>
      <th>Sl No</th>
       <th>PDF File</th>
       <th>Status</th>
        <th>View</th>
    </tr>
  </thead>
<tbody></tbody>
</table>



                                
                            </div>




<div id='coordinates_div' style="display: none">

<h5>Image Coordinates:</h5>
<table class="table" border="0" id='image_tbl1'>
  <thead>
    <tr><th>Sl No</th><th>Name</th><th>Width</th><th>Height</th><th>Page#</th></tr>



  </thead>
<tbody></tbody>

</table>

<button class='btn btn-primary' id='update_co'>Update</button>

</div>




                            
                        </div>
                    </div>
                </div>
<script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  
  <!-- Page level custom scripts -->
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href='http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css' rel='stylesheet'/>

<link href='https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.12/plugins/codesample/css/prism.min.css' rel='stylesheet'/>
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>

<script src="{{ asset('js/mapping.js')}}"></script>
@endsection

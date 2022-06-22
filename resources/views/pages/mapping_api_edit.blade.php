@extends('layouts.default_new')
@section('content')

   <div class="row">
                    <div class="col-md-12">
                      <h4>Map Order Form with the source system </h4>
                      <br/>
                    <a href='/pages/mapping_api'><button class=' btn-primary'>Back</button></a>
<a href='#'><button class='clear_pdf  btn-primary'>Clear PDF</button></a>

                      
                        



<br/>   
<br/>                              

<div >
<div class='row'>
  <div class='col-md-6'>
    <div id='pdf_div'>
  

  

</div>
  </div>
   <div class='col-md-6' >
    <form id='form' style="overflow: auto;height: 400px;">
 <table class='table' id='map_tbl' border="1" width="100%" >
   <thead>
     <tr>
      <th>Map with PDF Fields</th>
       <th>QForms</th>
       
       <th>Status</th>
     </tr>
   </thead>
  
 <tbody>
  

 </tbody>
</table>

</form>
<!-- <h5>Image Coordinates:</h5>
Width:<input type='text' id='width'/><br/>
Height:<input type='text' id='height'/><br/>
 Page No:<input type='text' id="page_no"/>
<br/><br/> -->
 
 <div style='display: none' id='fields_div'>
 <table class='table' id='map_tbl1' border="1" width="100%">
   <thead>
     <tr>
       <th>QForms</th>
       <th>Map with PDF Fields</th>
       
     </tr>
   </thead>
  
 <tbody></tbody>
</table>

</div>





   </div>

</div>


</div>
<button class=' btn-primary' id='upload'>Update All</button>
    
                            </div>
                            <!-- <div class="tab-pane fade" id="nav-home1" role="tabpanel" aria-labelledby="nav-profile-tab">
<h4>Vew Details</h4>
<table class='table' id='table3' style="width:100%">
  <thead>
    <tr>
      <th>Sl No</th>
       <th>Mapped Id</th>
        <th>View</th>
    </tr>
  </thead>
<tbody></tbody>
</table>



                                
                            </div> -->








                          
                </div>
<script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  
  <!-- Page level custom scripts -->
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>



<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href='http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css' rel='stylesheet'/>

<link href='https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.12/plugins/codesample/css/prism.min.css' rel='stylesheet'/>
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> -->

<script src="{{ asset('js/mapping_api_edit.js')}}"></script>
<style>
  #content-wrapper{overflow-y: auto !important;}
   #wrapper{display: block !important;}
</style>
@endsection

@extends('layouts.default_new')
@section('content')

   <div class="row">
                    <div class="col-md-12">
                      <h4><a href='/pages/mapping'><button class='btn btn-primary'>Back</button></a></h4>
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Update Map Details</a>

                                <!-- <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#nav-home1" role="tab" aria-controls="nav-home1" aria-selected="true">View Mapping Details</a>
                            -->
                                    
                            </div>
                           
                        </nav>
<div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

<br/>                              
<h4>Update Map Details</h4>
<div style="overflow: auto">
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
<button class='btn btn-primary' id='upload'>Update All</button>
    
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

<script src="{{ asset('js/mapping_edit.js')}}"></script>
@endsection

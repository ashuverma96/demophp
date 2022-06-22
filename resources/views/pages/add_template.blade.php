@extends('layouts.default_new')
@section('content')

   <div class="row">
                    <div class="col-md-12">
                        

 <a href='/pages/mapping_api'><button class=' btn-primary'>Back</button></a>
<br/>     <br/>                          
<h4>Add Template</h4>
<form id='form'>
   <h5> Template Name:</h5>

<input type="text" name="template_name" >
<br/> <h5> Pdf:</h5>

<input type="file" name="file" >
<br/><h5> Url:</h5>

<input type="text" name="url" >
<br/>
<div></div>
<h5>Image Coordinates:</h5>
<table class="table" border="0" id='image_tbl'>
  <thead>
    <tr><th>Sl No</th><th>Name</th><th>Width</th><th>Height</th><th>Page#</th><th>Action</th></tr>

<tr><th></th><th><input type='text'/></th><th><input type='text'/></th><th><input type='text'/></th><th><input type='text'/></th><th><button class='btn-primary' id="add">Add</button></th></tr>

  </thead>
<tbody></tbody>

</table>
<!-- Width(cm):<input type='text' name="width"/>
<br/><br/>  
Height(cm):<input type='text' name="height"/>
<br/><br/>
Page No:<input type='text' name="page_no"/>
<br/><br/> -->
<h5 class='error' style='color:red;font-size: 16px'></h5>
<button class='btn-primary' id='upload'>Save & Close</button>
<a href=""><button class='btn-primary' id=''>Save & Map</button>
</a>
<button class='btn-primary' id='cancel'>Cancel</button>
</form>

    
                            </div>
                            




<div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
      <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
        <header class="modal__header">
          <h2 class="modal__title" id="modal-1-title">
            Image Coordinates
          </h2>
          <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
        </header>
        <main class="modal__content" id="modal-1-content">
        
<table class="table" border="0" id='image_tbl1'>
  <thead>
    <tr><th>Sl No</th><th>Name</th><th>Width</th><th>Height</th><th>Page#</th></tr>



  </thead>
<tbody></tbody>

</table>

<button class='btn btn-primary' id='update_co'>Update</button>
        </main>
        <footer class="modal__footer">
          
          <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Close</button>
        </footer>
      </div>
    </div>
  </div>






<!-- <div id='coordinates_div' style="display: none">

<h5>Image Coordinates:</h5>
<table class="table" border="0" id='image_tbl1'>
  <thead>
    <tr><th>Sl No</th><th>Name</th><th>Width</th><th>Height</th><th>Page#</th></tr>



  </thead>
<tbody></tbody>

</table>

<button class='btn btn-primary' id='update_co'>Update</button>

</div> -->

<div class="modal micromodal-slide" id="modal-2" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
      <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
        <header class="modal__header">
          <h2 class="modal__title" id="modal-2-title">
            PDF Form
          </h2>
          <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
        </header>
        <main class="modal__content" id="modal-2-content">
        
<div id='pdf_div'>
  
  
</div>
        </main>
        <footer class="modal__footer">
          
          <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Close</button>
        </footer>
      </div>
    </div>
  </div>


                          
                </div>
<script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js')}}"></script>



<script src="{{ asset('js/add_template.js')}}"></script>
@endsection

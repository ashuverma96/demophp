@extends('layouts.default')
@section('content')

   <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Subscription Details</a>
                           
                                    
                            </div>
                           
                        </nav>
<div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

<br/>                              
<h4>Subscription Details</h4>
<div style="overflow: auto">
<table border="1"  id='subscription_tbl' class='table'>

  <thead>
    
    <tr>
      <th>Subscription Type</th>
      <th colspan="4">Expentor Hosted</th>
      <th colspan="2">Client Hosted</th>
       
    </tr>
  </thead>
  <tbody>
    
  </tbody>
  


</table>
</div>
<button class='btn btn-primary' id='save_all'>Save All</button>
    
                            </div>
                            <div class="tab-pane fade" id="nav-home1" role="tabpanel" aria-labelledby="nav-profile-tab">

<form id='form'>
  <br/>

Name:
<br/>
<input type='text' name='name'/>
<br/>
  User Name:
<br/>
<input type='text' name='uid'/>
<br/>
  Details:
<br/>
<textarea class="tinymce"></textarea>

<br/>
  

<br/>
  
<button id='upload' class='btn btn-primary'>Save</button>


</form>



                                
                            </div>


<div id='pdf_div' style='display:none1'>
  

  

</div>





                            
                        </div>
                    </div>
                </div>
<style>
  .inp{width:140px;}

</style>
@endsection

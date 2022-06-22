@extends('layouts.default')
@section('content')
   
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4">Wheat Management</h2>
                        
                       <form  id="form1" method="POST" enctype="multipart/form-data">
                        <div class='row'>
                         <div class="col-md-3">
  <label for="exampleFormControlInput1" class="form-label required" required>Template</label>
  <input type="text" class="form-control"  name="template" id="exampleFormControlInput1" placeholder="Template" required="">
</div>
</div>
<div class='row'>
<div class="col-md-3">
  <label for="formFileSm" class="form-label required">Image:</label>
  <input class="form-control form-control-sm" id="formFileSm" name="file" type="file"   required="">
</div>

</div>
<div class='row'>
<div class="col-md-3">
  <br>
  <div><h4 class='error' style='color:red'></h4></div>
   <div><h4 class='success' style='color:green'></h4></div>    
<button class="btn btn-primary" id="submit">Submit</button>
</div>
</div>
                       </form>
                    </div>
                </main>
                
          

@endsection
@section('scripts')
<script>
$("body").on("submit", "#form1", function(e){
     $(".success").html("")
     $(".error").html("")
            e.preventDefault();
            $("#submit").attr("disabled",true)
    $.ajax({
    type: "POST",
    url: "/add_wheat",// where you wanna post
    data: new FormData(this),
    processData: false,
    contentType: false,
    dataType:"json",
    error: function(jqXHR, textStatus, errorMessage) {
        $(".error").html(errorMessage); 
        $("#submit").removeAttr("disabled")// Optional
    },
    success: function(data) {
         $(".success").html(data.data);
         $(".error").html(data.error);
          $("#submit").removeAttr("disabled")
        
        
    } 
});
 });    
</script>

<style type="text/css">
  form .required:after {
  content: " *";
    color: red;
    font-weight: 100;
}
</style>


  @stop
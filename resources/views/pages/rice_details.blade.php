@extends('layouts.default')
@section('content')
   
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4">Basumathi Rice Management View Details</h2>
                        
                        <table id="table3" class="table table-bordered table-striped table-responsive">
                                        <thead>
                                            <tr>
                                                <th>SL No</th>
                                                <th>Created On</th>
                                                <th>Template</th>
                                                <th>Uploaded image</th>
                                                <th>Resulted Image</th>
                                                <th>Count</th>
                                                <th>Grade</th>
                                                <th>Accuracy(Approx)%</th>
                                                

                                            </tr>
                                        </thead>
                                        <tbody>
                                           

                                        </tbody>

                                    </table>
                    </div>
                </main>
                
          

@endsection
@section('scripts')
<script>
$("#table3").DataTable({
                  "processing": true,
        "serverSide": true,
        "bPaginate":true, // Pagination True
      "sPaginationType":"full_numbers", // And its type.
       "iDisplayLength": 10,
      
        select: true,
       //Initial no order.
         "search": {
    "search": ''
  },
        "ajax": {
           
           url:"get_rice_details", 
   dataType:"JSON",
   type:"get",
 
   
           
            "dataSrc": function (json1) {
          var return_data=new Array(); 
          var data=json1.data;
          var k=1;
          for(var i=0;i<data.length;i++){
           
            
             
              
        return_data.push({
              
          'id':k++,
          
          
         "template":data[i].template,
          "created_on":data[i].created_on,
          
           "file":"<a href='download/"+(data[i].file)+"'>"+(data[i].file)+"</a>",
           "resulted_file":"<a href='download/"+data[i].resulted_file+"'>"+data[i].resulted_file+"</a>",
                  "count":"A="+data[i].grade_a+"<br/>"+"B="+data[i].grade_b+"<br/>C="+data[i].grade_c+"<br/>Total="+data[i].total,
          "grade":data[i].grade,
          "accuracy":"Yolo-tiny:"+data[i].accuracy_tiny+"<br/>YoloV4:"+data[i].accuracy_v4+"<br/>YoloV5:>="+data[i].accuracy_v4,
        // "action":"<button class='view btn btn-primary' value='"+id+"'>View</button><br/>"
         // +"<select ids='"+id+"' class='make_active_inactive'><option value=''>--select--</option>"
         // +"<option value='active'>--Active--</option>"
         // +"<option value='inactive'>--Inactive--</option>"
         // +"</select>"
        // +"<button data-micromodal-trigger='modal-1' class='coordinates btn btn-primary' value='"+id+"'>Coordinates</button><br/>"
        //+"<button class='pdftk btn btn-primary' value='"+id+"'>Fillable PDF</button><br/>"
        
        
         

         
        
           "recordsTotal":11,
          
           "recordsFiltered":11,
          
        });
       }
    //$("#table11_filter").find("input").css({"width":"700px","margin-left":"-50%"});
       $("#table3_filter").find("input").attr("placeholder","Search  Template ");
      return return_data;
       },
       error:function(xhr){
       // alert(xhr.responseText);

       }
    
        } ,
        // "createdRow": function ( row, data, index ) {
         
        //         $('td',row).find(".credit").parent().parent().addClass('highlight');
            
        // },
         "columnDefs": [
        { 
            //"targets": [ 0,2,3,5], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
        "columns": [
           { "data": "id" },
          
            { "data": "created_on" },
             { "data": "template" },
             { "data": "file" },
                                     { "data": "resulted_file" },
                                     
                               {"data":"count"},
                               {"data":"grade"}, {"data":"accuracy"},
                                  
               
        ]
   
             });
              

</script>


  @stop
<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Login;
use PDF;
use DB;
use MongoDB\BSON\ObjectID;
use Illuminate\Support\Facades\Storage;
//use mikehaertl\pdftk\Pdf;
//use mikehaertl\pdftk\Pdftk;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
public $pdf_file="";

public function get_pdf_file() {
 	
        try{

        	$id=$_REQUEST['id'];
        	
$data = DB::connection('mongodb')->collection('mapped_field_details')->where(
	array(
		'_id'=> new ObjectID($id))
)->get(); 

foreach ($data as $data1) {
	
	$this->pdf_file=$data1['pdf_file'];
	
}

return $this->pdf_file;

}catch(\Exception $e){
  
//echo $e->getMessage();die();
}
    }

public function index() {
      return view("index");

   }

public function login(Request $request) {
  session_start();
$uid=$request->post("uid");
$pwd=$request->post("pwd");
try{
$data = DB::connection('mongodb')->collection('login')->where(array("user_id"=>$uid,"pwd"=>$pwd))->get();   

$count=0;  

foreach($data as $data1){
$count++;



}

if($count>=1){
  $_SESSION['user_name']=$uid;
  echo json_encode(array(
"_token"=> csrf_token(),
"data"=>$data
));



}else{
  
  return response("Invalid Login")
                ->header('Content-Type', "text");
                
	
}

}catch(Exception $e){
	//echo "aaa";
echo $e->getMessage();
}



   }

public function home() {
      return view("pages/home");

   }


public function rice() {
      return view("pages/rice");

   }


 public function rice_sona() {
      return view("pages/rice_sona");

   }  
public function home_details() {
      return view("pages/home_details");

   }
 public function rice_other() {
      return view("pages/other");

   }
public function rice_details() {
      return view("pages/rice_details");

   }
public function rice_sona_details() {
      return view("pages/rice_sona_details");

   }
public function other_details() {
      return view("pages/other_details");

   }

public function add_wheat(Request $request){

  $template=$request->post("template");

if(trim($template)==""){
  return response(array("error"=>"Please Enter Template name"));
}
        if($image = $request->file('file')){

if($image->getClientOriginalExtension()!="jpg" && $image->getClientOriginalExtension()!="png"
&& $image->getClientOriginalExtension()!="JPEG"&& $image->getClientOriginalExtension()!="jpeg"){
return response(array("error"=>"Invalid file extension"));
}


       
$name1 = uniqid().'.jpg';
        $destinationPath = public_path('images/');
        $image->move($destinationPath, $name1);
        
}else{
  return response(array("error"=>"Please upload Image"));
}
        
        $data=array();
    $data= DB::connection('mongodb')->collection('grain_details')->where('template', 'LIKE', '%'. $template . '%')->get();
if(count($data)>=1){
 return response(array("error"=>"Template name already exists"));
}
date_default_timezone_set("Asia/kolkata");
$created_on= date('Y-m-d H:i:s');
$bucket = DB::connection('mongodb')->getMongoDB()->selectGridFSBucket();
    $resource = fopen(public_path("images\/".$name1), "a+");
  //echo $_FILES['file']['tmp_name'];

    $file_id = $bucket->uploadFromStream(public_path("image\/".$name1), $resource);
  
    $id=DB::connection('mongodb')->collection('grain_details')->insertGetId(array(
               'template' => $template,
               'created_on' => $created_on,
               'file_id' => $file_id,
               "file"=>$name1,
               'resulted_file' => "",
               'count' => 0,
                
                'grade' => 0,
                'type' => "wheat"
                
                 
               
              ));


$uid_file=uniqid();
$file_name_out=public_path("images\/".$uid_file."_output.jpg");
    $template_name="grain_details";
    $data =  DB::connection('mongodb')->collection($template_name)->where(array("_id"=>new ObjectID($id)))->get();  
    
    $bucket = DB::connection('mongodb')->getMongoDB()->selectGridFSBucket();
    
    $downloadStream = $bucket->openDownloadStream(new ObjectID($data[0]['file_id']));
  //echo $data[0]['pdf_file'];
    $stream = stream_get_contents($downloadStream, -1);
  //$ifp = fopen(public_path("pdf".$this->seperator."schema1.pdf"), "w");
    //file_put_contents("schema1.pdf", $stream);
    file_put_contents($file_name_out, $stream);
    $obj_nmes=public_path("wheat\obj.names");
    $cfg_file=public_path("wheat\custom-yolov4-tiny-detector.cfg");
    $weights_file=public_path("wheat\custom-yolov4-tiny-detector_6000.weights");
   $command = (public_path("wheat\index.exe"). " ".$file_name_out." ".$obj_nmes." ".$cfg_file." ".$weights_file);
  //////////error_log(print_r($command));
  
  exec($command . " 2>&1", $output);
  // error_log(($command));
  // error_log(print_r($output),TRUE);
  //////////error_log(print_r($output));
  //////////error_log(print_r($output),TRUE);
  //$output = shell_exec($command);
  // $grand_output=$output;
  // $output_data=$output[0];
  $output=$output[0];
    if(isset($output)){
  $output=json_decode($output,true);

$result=array($output[0]["grade_a"],$output[0]["grade_b"],$output[0]["grade_c"]);
$index = array_search(max($result), $result);

$grade="";
if($index==0){
$grade="A";
}
if($index==1){
$grade="B";
}if($index==2){
$grade="C";
}

if(max($result)==0){
  $grade="";
}
$total=(int)$output[0]["grade_a"]+(int)$output[0]["grade_b"]+(int)$output[0]["grade_c"];

  $accuracy_v4=round(($total/($total+10))*100,2);
// if($accuracy_tiny>=100){
//   $accuracy_tiny=100;
// }
// $accuracy_v4=round((3/2)*$accuracy_tiny,2);
// if($accuracy_v4>=100){
//   $accuracy_v4=100;
// }
// $accuracy_v4=$accuracy_v4;



  DB::connection('mongodb')->collection('grain_details')->where(
      "_id", new ObjectID($id)
      )->update(array("grade"=>$grade,"grade_a"=>$output[0]["grade_a"],"grade_b"=>$output[0]["grade_b"],"grade_c"=>$output[0]["grade_c"],
"resulted_file"=>$uid_file."_output.jpg","total"=>$total,"accuracy_v4"=>$accuracy_v4
    ));

}
     return response(array("data"=>"Successfully  Uploaded Image"));
 
  }



public function add_other(Request $request){

  $template=$request->post("template");

if(trim($template)==""){
  return response(array("error"=>"Please Enter Template name"));
}
        if($image = $request->file('file')){

if($image->getClientOriginalExtension()!="jpg" && $image->getClientOriginalExtension()!="png"
&& $image->getClientOriginalExtension()!="jpeg"&& $image->getClientOriginalExtension()!="JPEG"){
return response(array("error"=>"Invalid file extension"));
}


       
$name1 = uniqid().'.jpg';
        $destinationPath = public_path('images/');
        $image->move($destinationPath, $name1);
        
}else{
  return response(array("error"=>"Please upload Image"));
}
        
        $data=array();
    $data= DB::connection('mongodb')->collection('grain_details')->where('template', 'LIKE', '%'. $template . '%')->get();
if(count($data)>=1){
 return response(array("error"=>"Template name already exists"));}
date_default_timezone_set("Asia/kolkata");
$created_on= date('Y-m-d H:i:s');
$bucket = DB::connection('mongodb')->getMongoDB()->selectGridFSBucket();
    $resource = fopen(public_path("images\/".$name1), "a+");
  //echo $_FILES['file']['tmp_name'];

    $file_id = $bucket->uploadFromStream(public_path("images\/".$name1), $resource);
  
    $id=DB::connection('mongodb')->collection('grain_details')->insertGetId(array(
               'template' => $template,
               'created_on' => $created_on,
               'file_id' => $file_id,
               "file"=>$name1,
               'resulted_file' => "",
               'count' => 0,
                
                'grade' => 0,
                'type' => "other"
                
                 
               
              ));

$uid_file=uniqid();
$file_name_out=public_path("images\/".$uid_file."_output.jpg");
    $template_name="grain_details";
    $data =  DB::connection('mongodb')->collection($template_name)->where(array("_id"=>new ObjectID($id)))->get();  
    
    $bucket = DB::connection('mongodb')->getMongoDB()->selectGridFSBucket();
    
    $downloadStream = $bucket->openDownloadStream(new ObjectID($data[0]['file_id']));
  //echo $data[0]['pdf_file'];
    $stream = stream_get_contents($downloadStream, -1);
  //$ifp = fopen(public_path("pdf".$this->seperator."schema1.pdf"), "w");
    //file_put_contents("schema1.pdf", $stream);
    file_put_contents($file_name_out, $stream);
    $obj_nmes=public_path("other\obj.names");
    $cfg_file=public_path("other\custom-yolov4-tiny-detector.cfg");
    $weights_file=public_path("other\custom-yolov4-tiny-detector_6000.weights");
   $command = (public_path("other\index.exe"). " ".$file_name_out." ".$obj_nmes." ".$cfg_file." ".$weights_file);
  //////////error_log(print_r($command));
  
  exec($command . " 2>&1", $output);
  // error_log(($command));
  // error_log(print_r($output),TRUE);
  //////////error_log(print_r($output));
  //////////error_log(print_r($output),TRUE);
  //$output = shell_exec($command);
  // $grand_output=$output;
  // $output_data=$output[0];
  $output=$output[0];
  if(isset($output)){
$output=json_decode($output,true);


$result=array($output[0]["grade_a"],$output[0]["grade_b"]);
$index = array_search(max($result), $result);

$grade="";
if($index==0){
$grade="A";
}
else if($index==1){
$grade="B";
}
else{
$grade="C";
}

if(max($result)==0){
  $grade="";
}
$total=(int)$output[0]["grade_a"]+(int)$output[0]["grade_b"]+(int)$output[0]["grade_c"];

  $accuracy_tiny=round(($total/($total+15))*100,2);
if($accuracy_tiny>=100){
  $accuracy_tiny=100;
}
$accuracy_v4=round((3/2)*$accuracy_tiny,2);
if($accuracy_v4>=100){
  $accuracy_v4=100;
}
$accuracy_v4=$accuracy_v4;



  DB::connection('mongodb')->collection('grain_details')->where(
      "_id", new ObjectID($id)
      )->update(array("grade"=>$grade,"grade_a"=>$output[0]["grade_a"],"grade_b"=>$output[0]["grade_b"],"grade_c"=>$output[0]["grade_c"],
"resulted_file"=>$uid_file."_output.jpg","total"=>$total,"accuracy_tiny"=>$accuracy_tiny,"accuracy_v4"=>$accuracy_v4
    ));
  }
  

     return response(array("data"=>"Successfully  Uploaded Image"));
 
  }


public function add_rice(Request $request){

  $template=$request->post("template");

if(trim($template)==""){
  return response(array("error"=>"Please Enter Template name"));
}
        if($image = $request->file('file')){

if($image->getClientOriginalExtension()!="jpg" && $image->getClientOriginalExtension()!="png"
&& $image->getClientOriginalExtension()!="jpeg"&& $image->getClientOriginalExtension()!="JPEG"){
return response(array("error"=>"Invalid file extension"));
}


       
$name1 = uniqid().'.jpg';
        $destinationPath = public_path('images/');
        $image->move($destinationPath, $name1);
        
}else{
  return response(array("error"=>"Please upload Image"));
}
        
        $data=array();
    $data= DB::connection('mongodb')->collection('grain_details')->where('template', 'LIKE', '%'. $template . '%')->get();
if(count($data)>=1){
 return response(array("error"=>"Template name already exists"));}
date_default_timezone_set("Asia/kolkata");
$created_on= date('Y-m-d H:i:s');
$bucket = DB::connection('mongodb')->getMongoDB()->selectGridFSBucket();
    $resource = fopen(public_path("images\/".$name1), "a+");
  //echo $_FILES['file']['tmp_name'];

    $file_id = $bucket->uploadFromStream(public_path("images\/".$name1), $resource);
  
    $id=DB::connection('mongodb')->collection('grain_details')->insertGetId(array(
               'template' => $template,
               'created_on' => $created_on,
               'file_id' => $file_id,
               "file"=>$name1,
               'resulted_file' => "",
               'count' => 0,
                
                'grade' => 0,
                'type' => "basumathi"
                
                 
               
              ));

$uid_file=uniqid();
$file_name_out=public_path("images\/".$uid_file."_output.jpg");
    $template_name="grain_details";
    $data =  DB::connection('mongodb')->collection($template_name)->where(array("_id"=>new ObjectID($id)))->get();  
    
    $bucket = DB::connection('mongodb')->getMongoDB()->selectGridFSBucket();
    
    $downloadStream = $bucket->openDownloadStream(new ObjectID($data[0]['file_id']));
  //echo $data[0]['pdf_file'];
    $stream = stream_get_contents($downloadStream, -1);
  //$ifp = fopen(public_path("pdf".$this->seperator."schema1.pdf"), "w");
    //file_put_contents("schema1.pdf", $stream);
    file_put_contents($file_name_out, $stream);
    $obj_nmes=public_path("basumathi\obj.names");
    $cfg_file=public_path("basumathi\custom-yolov4-tiny-detector.cfg");
    $weights_file=public_path("basumathi\custom-yolov4-tiny-detector_4000.weights");
   $command = (public_path("basumathi\index.exe"). " ".$file_name_out." ".$obj_nmes." ".$cfg_file." ".$weights_file);
  //////////error_log(print_r($command));
  
  exec($command . " 2>&1", $output);
  // error_log(($command));
  // error_log(print_r($output),TRUE);
  //////////error_log(print_r($output));
  //////////error_log(print_r($output),TRUE);
  //$output = shell_exec($command);
  // $grand_output=$output;
  // $output_data=$output[0];
  $output=$output[0];
  if(isset($output)){
$output=json_decode($output,true);


$result=array($output[0]["grade_a"],$output[0]["grade_b"]);
$index = array_search(max($result), $result);

$grade="";
if($index==0){
$grade="A";
}
else if($index==1){
$grade="B";
}
else{
$grade="C";
}

if(max($result)==0){
  $grade="";
}
$total=(int)$output[0]["grade_a"]+(int)$output[0]["grade_b"];

  $accuracy_tiny=round(($total/($total+10))*100,2);
if($accuracy_tiny>=100){
  $accuracy_tiny=100;
}
$accuracy_v4=round((3/2)*$accuracy_tiny,2);
if($accuracy_v4>=100){
  $accuracy_v4=100;
}
$accuracy_v4=$accuracy_v4;



  DB::connection('mongodb')->collection('grain_details')->where(
      "_id", new ObjectID($id)
      )->update(array("grade"=>$grade,"grade_a"=>$output[0]["grade_a"],"grade_b"=>$output[0]["grade_b"],"grade_c"=>0,
"resulted_file"=>$uid_file."_output.jpg","total"=>$total,"accuracy_tiny"=>$accuracy_tiny,"accuracy_v4"=>$accuracy_v4
    ));
  }
  

     return response(array("data"=>"Successfully  Uploaded Image"));
 
  }



public function add_rice_sona(Request $request){

  $template=$request->post("template");

if(trim($template)==""){
  return response(array("error"=>"Please Enter Template name"));
}
        if($image = $request->file('file')){

if($image->getClientOriginalExtension()!="jpg" && $image->getClientOriginalExtension()!="png"
&& $image->getClientOriginalExtension()!="JPEG"&& $image->getClientOriginalExtension()!="jpeg"){
return response(array("error"=>"Invalid file extension"));
}


       
$name1 = uniqid().'.jpg';
        $destinationPath = public_path('images/');
        $image->move($destinationPath, $name1);
        
}else{
  return response(array("error"=>"Please upload Image"));
}
        
        $data=array();
    $data= DB::connection('mongodb')->collection('grain_details')->where('template', 'LIKE', '%'. $template . '%')->get();
if(count($data)>=1){
 return response(array("error"=>"Template name already exists"));
}
date_default_timezone_set("Asia/kolkata");
$created_on= date('Y-m-d H:i:s');
$bucket = DB::connection('mongodb')->getMongoDB()->selectGridFSBucket();
    $resource = fopen(public_path("images\/".$name1), "a+");
  //echo $_FILES['file']['tmp_name'];

    $file_id = $bucket->uploadFromStream(public_path("image\/".$name1), $resource);
  
    $id=DB::connection('mongodb')->collection('grain_details')->insertGetId(array(
               'template' => $template,
               'created_on' => $created_on,
               'file_id' => $file_id,
               "file"=>$name1,
               'resulted_file' => "",
               'count' => 0,
                
                'grade' => 0,
                'type' => "sona"
                
                 
               
              ));


$uid_file=uniqid();
$file_name_out=public_path("images\/".$uid_file."_output.jpg");
    $template_name="grain_details";
    $data =  DB::connection('mongodb')->collection($template_name)->where(array("_id"=>new ObjectID($id)))->get();  
    
    $bucket = DB::connection('mongodb')->getMongoDB()->selectGridFSBucket();
    
    $downloadStream = $bucket->openDownloadStream(new ObjectID($data[0]['file_id']));
  //echo $data[0]['pdf_file'];
    $stream = stream_get_contents($downloadStream, -1);
  //$ifp = fopen(public_path("pdf".$this->seperator."schema1.pdf"), "w");
    //file_put_contents("schema1.pdf", $stream);
    file_put_contents($file_name_out, $stream);
    $obj_nmes=public_path("sona\obj.names");
    $cfg_file=public_path("sona\custom-yolov4-detector.cfg");
    $weights_file=public_path("sona\custom-yolov4-detector_1000.weights");
   $command = (public_path("sona\index.exe"). " ".$file_name_out." ".$obj_nmes." ".$cfg_file." ".$weights_file);
  //////////error_log(print_r($command));
  
  exec($command . " 2>&1", $output);
  // error_log(($command));
  // error_log(print_r($output),TRUE);
  //////////error_log(print_r($output));
  //////////error_log(print_r($output),TRUE);
  //$output = shell_exec($command);
  // $grand_output=$output;
  // $output_data=$output[0];
  $output=$output[0];
    if(isset($output)){
  $output=json_decode($output,true);

$result=array($output[0]["grade_a"],$output[0]["grade_b"],$output[0]["grade_c"]);
$index = array_search(max($result), $result);

$grade="";
if($index==0){
$grade="A";
}
if($index==1){
$grade="B";
}if($index==2){
$grade="C";
}

if(max($result)==0){
  $grade="";
}
$total=(int)$output[0]["grade_a"]+(int)$output[0]["grade_b"]+(int)$output[0]["grade_c"];

  $accuracy_v4=round(($total/($total+5))*100,2);


  DB::connection('mongodb')->collection('grain_details')->where(
      "_id", new ObjectID($id)
      )->update(array("grade"=>$grade,"grade_a"=>$output[0]["grade_a"],"grade_b"=>$output[0]["grade_b"],"grade_c"=>$output[0]["grade_c"],
"resulted_file"=>$uid_file."_output.jpg","total"=>$total,"accuracy_v4"=>$accuracy_v4,"type_rice"=>$output[0]["type"]
    ));

}
     return response(array("data"=>"Successfully  Uploaded Image"));
 
  }



public function download(Request $request,$id) {

    return response()->download(public_path("images\/".$id)); 


}

public function logout(){
session_start();
$_SESSION['user_name']="";
unset($_SESSION['user_name']);
session_destroy();
  return redirect('/');
}
public function get_wheat_details(Request $request) {

$search=$request->post('search')['value'];


$start=(int)$request->post('start');

$length=(int)($request->post('length'));
if($search==""){
try{
$grand_data = DB::connection('mongodb')->collection('grain_details')->where("type","wheat")->get(); 




}catch(Exception $e){
	
echo $e->getMessage();
}

try{
$data = DB::connection('mongodb')->collection('grain_details')->where("type","wheat")->take($length)->skip($start)->select()->orderby("_id","desc")->get(); 



echo json_encode(array(
"data"=>$data,
"recordsTotal"=>count($grand_data),
"recordsFiltered"=>count($grand_data)
));


}catch(Exception $e){
  
echo $e->getMessage();
}


}else{

try{
$grand_data = DB::connection('mongodb')->collection('grain_details')->where("type","wheat")->where('template', 'LIKE', '%'. $search . '%')->get(); 




}catch(Exception $e){
  
echo $e->getMessage();
}

try{
$data = DB::connection('mongodb')->collection('grain_details')->where("type","wheat")->where('template', 'LIKE', '%'. $search . '%')->take($length)->skip($start)->select()->orderby("_id","desc")->get(); 

echo json_encode(array(
"data"=>$data,
"recordsTotal"=>count($grand_data),
"recordsFiltered"=>count($grand_data)
));



}catch(Exception $e){
  
echo $e->getMessage();
}




}


   }


public function get_other_details(Request $request) {

$search=$request->post('search')['value'];


$start=(int)$request->post('start');

$length=(int)($request->post('length'));
if($search==""){
try{
$grand_data = DB::connection('mongodb')->collection('grain_details')->where("type","other")->get(); 




}catch(Exception $e){
  
echo $e->getMessage();
}

try{
$data = DB::connection('mongodb')->collection('grain_details')->where("type","other")->take($length)->skip($start)->select()->orderby("_id","desc")->get(); 



echo json_encode(array(
"data"=>$data,
"recordsTotal"=>count($grand_data),
"recordsFiltered"=>count($grand_data)
));


}catch(Exception $e){
  
echo $e->getMessage();
}


}else{

try{
$grand_data = DB::connection('mongodb')->collection('grain_details')->where("type","other")->where('template', 'LIKE', '%'. $search . '%')->get(); 




}catch(Exception $e){
  
echo $e->getMessage();
}

try{
$data = DB::connection('mongodb')->collection('grain_details')->where("type","other")->where('template', 'LIKE', '%'. $search . '%')->take($length)->skip($start)->select()->orderby("_id","desc")->get(); 

echo json_encode(array(
"data"=>$data,
"recordsTotal"=>count($grand_data),
"recordsFiltered"=>count($grand_data)
));



}catch(Exception $e){
  
echo $e->getMessage();
}




}


   }


public function get_rice_details(Request $request) {

$search=$request->post('search')['value'];


$start=(int)$request->post('start');

$length=(int)($request->post('length'));
if($search==""){
try{
$grand_data = DB::connection('mongodb')->collection('grain_details')->where("type","basumathi")->get(); 




}catch(Exception $e){
  
echo $e->getMessage();
}

try{
$data = DB::connection('mongodb')->collection('grain_details')->where("type","basumathi")->take($length)->skip($start)->select()->orderby("_id","desc")->get(); 



echo json_encode(array(
"data"=>$data,
"recordsTotal"=>count($grand_data),
"recordsFiltered"=>count($grand_data)
));


}catch(Exception $e){
  
echo $e->getMessage();
}


}else{

try{
$grand_data = DB::connection('mongodb')->collection('grain_details')->where("type","basumathi")->where('template', 'LIKE', '%'. $search . '%')->get(); 




}catch(Exception $e){
  
echo $e->getMessage();
}

try{
$data = DB::connection('mongodb')->collection('grain_details')->where("type","basumathi")->where('template', 'LIKE', '%'. $search . '%')->take($length)->skip($start)->select()->orderby("_id","desc")->get(); 

echo json_encode(array(
"data"=>$data,
"recordsTotal"=>count($grand_data),
"recordsFiltered"=>count($grand_data)
));



}catch(Exception $e){
  
echo $e->getMessage();
}




}


   }


public function get_rice_details_sona(Request $request) {

$search=$request->post('search')['value'];


$start=(int)$request->post('start');

$length=(int)($request->post('length'));
if($search==""){
try{
$grand_data = DB::connection('mongodb')->collection('grain_details')->where("type","sona")->get(); 




}catch(Exception $e){
  
echo $e->getMessage();
}

try{
$data = DB::connection('mongodb')->collection('grain_details')->where("type","sona")->take($length)->skip($start)->select()->orderby("_id","desc")->get(); 



echo json_encode(array(
"data"=>$data,
"recordsTotal"=>count($grand_data),
"recordsFiltered"=>count($grand_data)
));


}catch(Exception $e){
  
echo $e->getMessage();
}


}else{

try{
$grand_data = DB::connection('mongodb')->collection('grain_details')->where("type","sona")->where('template', 'LIKE', '%'. $search . '%')->get(); 




}catch(Exception $e){
  
echo $e->getMessage();
}

try{
$data = DB::connection('mongodb')->collection('grain_details')->where("type","sona")->where('template', 'LIKE', '%'. $search . '%')->take($length)->skip($start)->select()->orderby("_id","desc")->get(); 

echo json_encode(array(
"data"=>$data,
"recordsTotal"=>count($grand_data),
"recordsFiltered"=>count($grand_data)
));



}catch(Exception $e){
  
echo $e->getMessage();
}




}


   }

//   public function mapping_api(Request $request){
// return view("pages/mapping_api");

// }

// public function mapping_api_edit(Request $request){
// return view("pages/mapping_api_edit");

// }

}




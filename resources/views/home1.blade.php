<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta http-equiv="Cache-control" content="no-cache">

  <title>CRUD Management</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
 <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
<?php include("../sidebar.php");?>
    <!-- Sidebar -->
    
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
<?php include("../header.php");?>      
           <!-- End of Topbar -->

        <!-- Begin Page Content -->

<div class="container-fluid">

          <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Report Details</a>
                           <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home1" role="tab" aria-controls="nav-home" aria-selected="true">Upload Data</a>
                                    
                            </div>
                           
                        </nav>
<div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <table id='table11' class='table' style='width:100%'>
<thead>
<tr>
<th>Sl NO</th>

<th>Name </th>
<th>User Name</th>
<th>Pwd</th>
<th>Action</th>
</tr>
</thead>
<tbody></tbody>


</table>
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
  Password:
<br/>
<input type='password' name='pwd'/>
<br/>
  

<br/>
  
<button id='upload' class='btn btn-primary'>Save</button>


</form>



                                
                            </div>








                            
                        </div>
                    </div>
                </div>
        </div>

        
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

 
  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  
  <!-- Page level custom scripts -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>


<script src='home.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href='http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css' rel='stylesheet'/>

</body>

</html>




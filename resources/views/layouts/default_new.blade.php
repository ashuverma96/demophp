<!doctype html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta http-equiv="Cache-control" content="no-cache">

  <title>Mapping</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
 <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.0.0/angular-material.min.css">
    <link rel="stylesheet" href="https://rawgit.com/daniel-nagy/md-data-table/master/dist/md-data-table.css">

</head>


<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
<header class="row">
        
    </header>
    <!-- Sidebar -->
    
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content" >
        <!-- Topbar -->
 @include('includes.header')  
           <!-- End of Topbar -->

        <!-- Begin Page Content -->

<div class="container">
 @yield('content')
          
        </div>

        
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="row">
       <!--  @include('includes.footer_new') -->
    </footer>

      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
 <!--  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a> -->

 
  <!-- Bootstrap core JavaScript-->
  
</body>

</html>
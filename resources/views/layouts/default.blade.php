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

  <title>Grain Management</title>

  <!-- Custom fonts for this template-->
  <!-- <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
 <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

 
  <link href="{{ asset('css/sb-admin-2.min.css')}}" rel="stylesheet"> -->
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{ asset('css/styles.css')}}" rel="stylesheet" />
</head>


<body class="sb-nav-fixed" >
 @include('includes.header')  
  <!-- Page Wrapper -->
  <div id="layoutSidenav">
        @include('includes.sidebar')
   
    <div id="layoutSidenav_content">

 @yield('content')
          
      
        @include('includes.footer')

         </div>
   </div>
</body>

</html>
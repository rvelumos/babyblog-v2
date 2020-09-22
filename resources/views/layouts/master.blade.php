<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Babyblog test</title>

  <link href="{{asset('css/css.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="{{asset('css/sb-admin-2.css')}}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div class="wrapper">

        <!-- top nav -->
        <div class='top_container'>
          @include('includes.navigation_top')
          </table>
        
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->          
        
          @yield('content')

        </div>
        <!-- /.container-fluid -->      

  </div>
  <!-- End of Page Wrapper -->


</body>
</html>

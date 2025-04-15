<!DOCTYPE html>
<html lang="en">

<head>
     <!-- Title Meta -->
     <meta charset="utf-8" />
     <title>Welcome | Airport</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="A fully responsive premium admin dashboard template, Real Estate Management Admin Template" />
     <meta name="author" content="Techzaa" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />

     <!-- App favicon -->
     <link rel="shortcut icon" href="/admin-template/dist/assets/images/favicon.ico">

     <!-- Vendor css (Require in all Page) -->
     <link href="/admin-template/dist/assets/css/vendor.min.css" rel="stylesheet" type="text/css" />

     <!-- Icons css (Require in all Page) -->
     <link href="/admin-template/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

     <!-- App css (Require in all Page) -->
     <link href="/admin-template/dist/assets/css/app.min.css" rel="stylesheet" type="text/css" />
     <link href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" rel="stylesheet" type="text/css" />

     <!-- Theme Config js (Require in all Page) -->
     <script src="/admin-template/dist/assets/js/config.min.js"></script>
</head>

<body>

     <!-- START Wrapper -->
     <div class="wrapper">

          <!-- ========== Topbar Start ========== -->

          @include('master.header')
         
          @include('master.main_nav')
         

        
          <div class="page-content">

        
               @yield('content')
             
               <footer class="footer">
                   <div class="container-fluid">
                       <div class="row">
                           <div class="col-12 text-center">
                               <script>document.write(new Date().getFullYear())</script> &copy; Lahomes. Crafted by <iconify-icon icon="solar:hearts-bold-duotone" class="fs-18 align-middle text-danger"></iconify-icon> <a
                                   href="" class="fw-bold footer-text" target="_blank">Techzaa</a>
                           </div>
                       </div>
                   </div>
               </footer>
               <!-- ========== Footer End ========== -->

          </div>
          <!-- ==================================================== -->
          <!-- End Page Content -->
          <!-- ==================================================== -->

     </div>
     <!-- END Wrapper -->

     <!-- Vendor Javascript (Require in all Page) -->
     <script src="/admin-template/dist/assets/js/vendor.js"></script>

     <!-- App Javascript (Require in all Page) -->
     <script src="/admin-template/dist/assets/js/app.js"></script>
     <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
     <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
     <script>
          	
new DataTable('#example');
     </script>

</body>

</html>
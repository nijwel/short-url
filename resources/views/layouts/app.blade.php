<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <title>Short Links</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="{{ asset('backend/') }}/assets/images/favicon_1.ico">

        <link href="{{ asset('backend/') }}/assets/plugins/sweetalert2/sweetalert2.css" rel="stylesheet" type="text/css">

        <!-- Dropzone css -->
        <link href="{{ asset('backend/') }}/assets/plugins/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">

        <!-- Custom Files -->
        <link href="{{ asset('backend/') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/') }}/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/') }}/assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="{{ asset('backend/') }}/assets/js/modernizr.min.js"></script>
    @stack('css')
    </head>


    <body class="fixed-left">
        @guest

        @else
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            @include('admin.includes.top_bar')
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->

            @include('admin.includes.side_bar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            @endguest
            @yield('content')
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <div class="side-bar right-bar nicescroll">
                <h4 class="text-center">Chat</h4>
                <div class="contact-list nicescroll">
                    <ul class="list-group contacts-list">
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-1.jpg" alt="">
                                </div>
                                <span class="name">Chadengle</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-2.jpg" alt="">
                                </div>
                                <span class="name">Tomaslau</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-3.jpg" alt="">
                                </div>
                                <span class="name">Stillnotdavid</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-4.jpg" alt="">
                                </div>
                                <span class="name">Kurafire</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-5.jpg" alt="">
                                </div>
                                <span class="name">Shahedk</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-6.jpg" alt="">
                                </div>
                                <span class="name">Adhamdannaway</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-7.jpg" alt="">
                                </div>
                                <span class="name">Ok</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-8.jpg" alt="">
                                </div>
                                <span class="name">Arashasghari</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-9.jpg" alt="">
                                </div>
                                <span class="name">Joshaustin</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-10.jpg" alt="">
                                </div>
                                <span class="name">Sortino</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{ asset('backend/') }}/assets/js/jquery-3.7.1.min.js"></script>
        <script src="{{ asset('backend/') }}/assets/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('backend/') }}/assets/js/detect.js"></script>
        <script src="{{ asset('backend/') }}/assets/js/fastclick.js"></script>
        <script src="{{ asset('backend/') }}/assets/js/jquery.slimscroll.js"></script>
        <script src="{{ asset('backend/') }}/assets/js/jquery.blockUI.js"></script>
        <script src="{{ asset('backend/') }}/assets/js/waves.js"></script>
        <script src="{{ asset('backend/') }}/assets/js/wow.min.js"></script>
        <script src="{{ asset('backend/') }}/assets/js/jquery.nicescroll.js"></script>
        <script src="{{ asset('backend/') }}/assets/js/jquery.scrollTo.min.js"></script>

        <!-- jQuery -->
        <script src="{{ asset('backend/') }}/assets/plugins/moment/moment.min.js"></script>

        <!-- Counter js  -->
        <script src="{{ asset('backend/') }}/assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="{{ asset('backend/') }}/assets/plugins/counterup/jquery.counterup.min.js"></script>

        <!-- sweet alerts -->
        <script src="{{ asset('backend/') }}/assets/plugins/sweetalert2/sweetalert2.js"></script>

        <!-- flot Chart -->
        <script src="{{ asset('backend/') }}/assets/plugins/flot-chart/jquery.flot.min.js"></script>
        <script src="{{ asset('backend/') }}/assets/plugins/flot-chart/jquery.flot.time.js"></script>
        <script src="{{ asset('backend/') }}/assets/plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="{{ asset('backend/') }}/assets/plugins/flot-chart/jquery.flot.resize.js"></script>
        <script src="{{ asset('backend/') }}/assets/plugins/flot-chart/jquery.flot.pie.js"></script>
        <script src="{{ asset('backend/') }}/assets/plugins/flot-chart/jquery.flot.selection.js"></script>
        <script src="{{ asset('backend/') }}/assets/plugins/flot-chart/jquery.flot.stack.js"></script>
        <script src="{{ asset('backend/') }}/assets/plugins/flot-chart/jquery.flot.crosshair.js"></script>

        <!-- Todoapp -->
        <script src="{{ asset('backend/') }}/assets/pages/jquery.todo.js"></script>

        <!-- jQuery  -->
        <script src="{{ asset('backend/') }}/assets/pages/jquery.chat.js"></script>

        <!-- Dashboard js  -->
        <script src="{{ asset('backend/') }}/assets/pages/jquery.dashboard.js"></script>

        <!-- Page Specific JS Libraries -->
        <script src="{{ asset('backend/') }}/assets/plugins/dropzone/dist/dropzone.js"></script>

        <!-- App js  -->
        <script src="{{ asset('backend/') }}/assets/js/jquery.app.js"></script>
        <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
        @stack('js')
         <script>
             $(document).on("click", "#delete", function(e){
                 e.preventDefault();
                 var link = $(this).attr("href");
                    swal({
                      title: "Are you Want to delete?",
                      text: "Once Delete, This will be Permanently Delete!",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,
                    })
                    .then((willDelete) => {
                      if (willDelete) {
                           window.location.href = link;
                      } else {
                        swal("Safe Data!");
                      }
                    });
                });
        </script>
        <script>
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });

        </script>


    </body>
</html>

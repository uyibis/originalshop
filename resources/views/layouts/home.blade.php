<!DOCTYPE html>
<html lang="en" dir="ltr" data-scompiler-id="0">
<!-- Mirrored from stroyka-admin.html.themeforest.scompiler.ru/variants/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Dec 2022 08:51:22 GMT -->

<head>
    <meta charSet="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="format-detection" content="telephone=no" />
    <title>Stroyka Admin - eCommerce Dashboard Template</title><!-- icon -->
    <link rel="icon" type="image/png" href="@asset('images/favicon.png')" /><!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" /><!-- css -->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.ltr.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/highlight.js/styles/github.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/simplebar/simplebar.min.css')}}" />
{{--    <link rel="stylesheet" href="{{asset('toastr-master - Copy/toastr.css')}}" />--}}
    <link rel="stylesheet" href="{{asset('vendor/quill/quill.snow.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/air-datepicker/css/datepicker.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/datatables/css/dataTables.bootstrap5.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/nouislider/nouislider.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/fullcalendar/main.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <link rel="stylesheet" href="{{asset( 'assets/css/loader.css')}}">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-97489509-8"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-97489509-8');
    </script>
    <!-- Scripts -->
</head>

<body>
<!-- sa-app -->
<div class="sa-app sa-app--desktop-sidebar-shown sa-app--mobile-sidebar-hidden sa-app--toolbar-fixed">
    <!-- sa-app__sidebar -->
    <div class="sa-app__sidebar">
        <div class="sa-sidebar">
            <!--<div class="sa-sidebar__header"><a class="sa-sidebar__logo" href="index-2.html">
                                &lt;!&ndash; logo &ndash;&gt;
                                <div class="sa-sidebar-logo"><svg xmlns="http://www.w3.org/2000/svg" width="120px" height="20px">
                                        <path d="M118.5,20h-1.1c-0.6,0-1.2-0.4-1.4-1l-1.5-4h-6.1l-1.5,4c-0.2,0.6-0.8,1-1.4,1h-1.1c-1,0-1.8-1-1.4-2l1.1-3l1.5-4l3.6-10c0.2-0.6,0.8-1,1.4-1h1.6c0.6,0,1.2,0.4,1.4,1l3.6,10l1.5,4l1.1,3C120.3,19,119.5,20,118.5,20z M111.5,6.6l-1.6,4.4h3.2L111.5,6.6z M99.5,20h-1.4c-0.4,0-0.7-0.2-0.9-0.5L94,14l-2,3.5v1c0,0.8-0.7,1.5-1.5,1.5h-1c-0.8,0-1.5-0.7-1.5-1.5v-17C88,0.7,88.7,0,89.5,0h1C91.3,0,92,0.7,92,1.5v8L94,6l3.2-5.5C97.4,0.2,97.7,0,98.1,0h1.4c1.2,0,1.9,1.3,1.3,2.3L96.3,10l4.5,7.8C101.4,18.8,100.7,20,99.5,20z M80.3,11.8L80,12.3v6.2c0,0.8-0.7,1.5-1.5,1.5h-1c-0.8,0-1.5-0.7-1.5-1.5v-6.2l-0.3-0.5l-5.5-9.5c-0.6-1,0.2-2.3,1.3-2.3h1.4c0.4,0,0.7,0.2,0.9,0.5L76,4.3l2,3.5l2-3.5l2.2-3.8C82.4,0.2,82.7,0,83.1,0h1.4c1.2,0,1.9,1.3,1.3,2.3L80.3,11.8z M60,20c-5.5,0-10-4.5-10-10S54.5,0,60,0s10,4.5,10,10S65.5,20,60,20z M60,4c-3.3,0-6,2.7-6,6s2.7,6,6,6s6-2.7,6-6S63.3,4,60,4z M47.8,17.8c0.6,1-0.2,2.3-1.3,2.3h-2L41,14h-4v4.5c0,0.8-0.7,1.5-1.5,1.5h-1c-0.8,0-1.5-0.7-1.5-1.5v-17C33,0.7,33.7,0,34.5,0H41c0.3,0,0.7,0,1,0.1c3.4,0.5,6,3.4,6,6.9c0,2.4-1.2,4.5-3.1,5.8L47.8,17.8z M42,4.2C41.7,4.1,41.3,4,41,4h-3c-0.6,0-1,0.4-1,1v4c0,0.6,0.4,1,1,1h3c0.3,0,0.7-0.1,1-0.2c0.3-0.1,0.6-0.3,0.9-0.5C43.6,8.8,44,7.9,44,7C44,5.7,43.2,4.6,42,4.2z M29.5,4H25v14.5c0,0.8-0.7,1.5-1.5,1.5h-1c-0.8,0-1.5-0.7-1.5-1.5V4h-4.5C15.7,4,15,3.3,15,2.5v-1C15,0.7,15.7,0,16.5,0h13C30.3,0,31,0.7,31,1.5v1C31,3.3,30.3,4,29.5,4z M6.5,20c-2.8,0-5.5-1.7-6.4-4c-0.4-1,0.3-2,1.3-2h1c0.5,0,0.9,0.3,1.2,0.7c0.2,0.3,0.4,0.6,0.8,0.8C4.9,15.8,5.8,16,6.5,16c1.5,0,2.8-0.9,2.8-2c0-0.7-0.5-1.3-1.2-1.6C7.4,12,7,11,7.4,10.3l0.4-0.9c0.4-0.7,1.2-1,1.8-0.6c0.6,0.3,1.2,0.7,1.6,1.2c1,1.1,1.7,2.5,1.7,4C13,17.3,10.1,20,6.5,20z M11.6,6h-1c-0.5,0-0.9-0.3-1.2-0.7C9.2,4.9,8.9,4.7,8.6,4.5C8.1,4.2,7.2,4,6.5,4C5,4,3.7,4.9,3.7,6c0,0.7,0.5,1.3,1.2,1.6C5.6,8,6,9,5.6,9.7l-0.4,0.9c-0.4,0.7-1.2,1-1.8,0.6c-0.6-0.3-1.2-0.7-1.6-1.2C0.6,8.9,0,7.5,0,6c0-3.3,2.9-6,6.5-6c2.8,0,5.5,1.7,6.4,4C13.3,4.9,12.6,6,11.6,6z"></path>
                                    </svg>
                                    <div class="sa-sidebar-logo__caption">Admin</div>
                                </div>&lt;!&ndash; logo / end &ndash;&gt;
                            </a>
                        </div>-->
            @include('layouts.mastermenu')
        </div>
        <div class="sa-app__sidebar-shadow"></div>
        <div class="sa-app__sidebar-backdrop" data-sa-close-sidebar=""></div>
    </div><!-- sa-app__sidebar / end -->
    <!-- sa-app__content -->
    <div class="sa-app__content">
        <!-- sa-app__toolbar -->
        @include('layouts.mastertoolbarmenu')
         <!-- sa-app__body -->
        <div id="top" class="sa-app__body px-2 px-lg-4">
            @yield('content')
        </div><!-- sa-app__body / end -->
        <!-- sa-app__footer -->
        <div class="sa-app__footer d-block d-md-flex">
            <!-- copyright -->Stroyka Admin — eCommerce Dashboard Template © 2021<div class="m-auto"></div>
            <div>Powered by HTML — Design by <a href="https://themeforest.net/user/kos9/portfolio">Kos</a></div><!-- copyright / end -->
        </div><!-- sa-app__footer / end -->
    </div><!-- sa-app__content / end -->
    <!-- sa-app__toasts -->
    <div class="sa-app__toasts toast-container bottom-0 end-0"></div><!-- sa-app__toasts / end -->
</div><!-- sa-app / end -->
<!-- scripts -->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/feather-icons/feather.min.js')}}"></script>
{{--<script src="{{asset('toastr-master - Copy/toastr.min.js')}}" />--}}
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script src="{{asset('vendor/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/highlight.js/highlight.pack.js')}}"></script>
<script src="{{asset('vendor/quill/quill.min.js')}}"></script>
<script src="{{asset('vendor/air-datepicker/js/datepicker.min.js')}}"></script>
<script src="{{asset('vendor/air-datepicker/js/i18n/datepicker.en.js')}}"></script>
<script src="{{asset('vendor/select2/js/select2.min.js')}}"></script>
<script src="{{asset('vendor/fontawesome/js/all.min.js')}}" data-auto-replace-svg="" async=""></script>
<script src="{{asset('vendor/chart.js/chart.min.js')}}"></script>
<script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('vendor/nouislider/nouislider.min.js')}}"></script>
<script src="{{asset('vendor/fullcalendar/main.min.js')}}"></script>
<script src="{{asset('js/stroyka.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('js/calendar.js')}}"></script>
<script src="{{asset('js/demo.js')}}"></script>
<script src="{{asset('js/demo-chart-js.js')}}"></script>
</body>
<!-- Mirrored from stroyka-admin.html.themeforest.scompiler.ru/variants/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Dec 2022 08:51:22 GMT -->

</html>

<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.2.2
* @link https://coreui.io
* Copyright (c) 2022 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<!-- Breadcrumb-->
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>CoreUI Free Bootstrap Admin Template</title>
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('') }}assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('') }}assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('') }}assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('') }}assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('') }}assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('') }}assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('') }}assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('') }}assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('') }}assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('') }}assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('') }}assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('') }}assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('') }}assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="{{ asset('') }}assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('') }}assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{ asset('') }}vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="{{ asset('') }}css/vendors/simplebar.css">
    <!-- Main styles for this application-->
    <link href="{{ asset('') }}css/style.css" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link rel="stylesheet" href="{{ asset('') }}https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <link href="{{ asset('') }}css/examples.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        // Shared ID
        gtag('config', 'UA-118965717-3');
        // Bootstrap ID
        gtag('config', 'UA-118965717-5');
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @yield("extrastyle")
</head>

<body>
    @include('component.sidebar')
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <header class="header header-sticky mb-4">
            <div class="container-fluid">
                <button class="header-toggler px-md-0 me-md-3" type="button"
                    onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
                    <svg class="icon icon-lg">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
                    </svg>
                </button><a class="header-brand d-md-none" href="#">
                    <svg width="118" height="46" alt="CoreUI Logo">
                        <use xlink:href="assets/brand/coreui.svg#full"></use>
                    </svg></a>
                <ul class="header-nav ms-3">
                    <li class="nav-item dropdown">
                        <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-md"><img class="avatar-img" src="{{ asset('') }}assets/img/avatars/8.jpg"
                                    alt="user@email.com"></div>
                        </a>
                        <!-- <div class="dropdown-menu dropdown-menu-end pt-0">

                            <div class="dropdown-header bg-light py-2">
                                <div class="fw-semibold">Settings</div>
                            </div>
                            <a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                </svg> Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                                </svg> Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-credit-card"></use>
                                </svg> Payments<span class="badge badge-sm bg-secondary ms-2">42</span>
                            </a>
                            <a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-file"></use>
                                </svg> Projects<span class="badge badge-sm bg-primary ms-2">42</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                </svg> Lock Account
                            </a>
                            <a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                                </svg> Logout
                            </a>
                        </div> -->
                    </li>
                </ul>
            </div>
            <div class="header-divider"></div>
            @yield("content_breadcumb")
        </header>
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                @yield("content_page")
            </div>
        </div>
        <footer class="footer">
            <div><a href="https://coreui.io">CoreUI </a><a href="https://coreui.io">Bootstrap Admin Template</a> © 2022
                creativeLabs.</div>
            <div class="ms-auto">Powered by&nbsp;<a href="https://coreui.io/docs/">CoreUI UI Components</a></div>
        </footer>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('') }}vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="{{ asset('') }}vendors/simplebar/js/simplebar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    @yield("extrajs")

</body>

</html>
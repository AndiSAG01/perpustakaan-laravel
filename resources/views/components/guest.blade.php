<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Perpustakaan SMA Negeri 1 Kota Jambi</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="guest/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="guest/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="guest/assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="guest/assets/img/favicons/favicon.png">
    <link rel="manifest" href="guest/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="guest/assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="guest/assets/css/theme.css" rel="stylesheet" />


    <!-- datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


</head>


<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <nav class="navbar navbar-expand-lg navbar-light sticky-top" data-navbar-on-scroll="data-navbar-on-scroll">
            <div class="container"><a class="navbar-brand" href="index.html"><img src="guest/assets/img/logo.svg"
                        height="31" alt="logo" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon">
                    </span></button>
                <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">

                    @if (Route::has('login'))
                        @auth
                            <ul class="navbar-nav ms-auto">
                                @if (Auth::user()->isAdmin == true)
                                    <li class="nav-item"><a class="nav-link" aria-current="page" href="/home">Home</a>
                                    </li>
                                @else
                                    <li class="nav-item"><a class="nav-link" aria-current="page"
                                            href="/dashboard">Dashboard</a>
                                    </li>
                                @endif
                                <li class="nav-item"><a class="nav-link" aria-current="page" href="/presensi">Presensi</a>
                                </li>
                            </ul>
                        @else
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item"><a class="nav-link" aria-current="page" href="/">Home</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" aria-current="page" href="/presensi">Presensi</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" aria-current="page" href="/find">Cari Buku</a>
                                </li>
                            </ul>
                            <div class="d-flex ms-lg-4 gap-1">
                                <a class="btn btn-outline-warning btn-sm" href="{{ route('login') }}">Masuk</a>

                                @if (Route::has('register'))
                                    <a class="btn btn-outline-warning btn-sm" href="{{ route('register') }}">Daftar</a>
                                @endif
                            </div>
                        @endauth
                </div>
                @endif
            </div>
            </div>
        </nav>
        {{ $slot }}
        <section class="pb-2 pb-lg-5">
            <div class="container">
                <div class="row border-top border-top-secondary pt-7">
                    <div
                        class="col-lg-3 col-md-6 mb-4 mb-md-6 mb-lg-0 mb-sm-2 order-1 order-md-1 order-lg-1 text-center">
                        <img class="p-0 m-0" src="guest/assets/img/logounam.png" width="75" alt="" />
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 order-3 order-md-3 order-lg-2 text-center">
                        <p class="fs-2 mb-lg-4 fw-bold">Terima kasih kepada</p>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"><a class="link-900 text-secondary text-decoration-none"
                                    href="#!">SMAN 1 Kota Jambi</a></li>
                            <li class="mb-1"><a class="link-900 text-secondary text-decoration-none"
                                    href="#!">UNAMA Jambi</a></li>
                            <li class="mb-1"><a class="link-900 text-secondary text-decoration-none"
                                    href="#!">Dosen Pembimbing 1 & 2</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 order-4 order-md-4 order-lg-3 text-center">
                        <p class="fs-2 mb-lg-4 fw-bold">Dirancang dengan</p>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"><a class="link-900 text-secondary text-decoration-none"
                                    href="#!">Laravel</a></li>
                            <li class="mb-1"><a class="link-900 text-secondary text-decoration-none"
                                    href="#!">Bootstrap 5</a></li>
                            <li class="mb-1"><a class="link-900 text-secondary text-decoration-none"
                                    href="#!">Sneat and Productly template</a></li>
                        </ul>
                    </div>
                    <div
                        class="col-lg-3 col-md-6 mb-4 mb-md-6 mb-lg-0 mb-sm-2 order-1 order-md-1 order-lg-1 text-center">
                        <img class="mb-4" src="guest/assets/img/logoSMA.jpg" width="100" alt="" />
                    </div>
                </div>
            </div><!-- end of .container-->

        </section>

        <section class="text-center py-0">

            <div class="container">
                <div class="container border-top py-3">
                    <div class="row justify-content-between">
                        <div class="col-12 col-md-auto mb-1 mb-md-0">
                            <p class="mb-0">&copy; 2022 Your Company Inc </p>
                        </div>
                        <div class="col-12 col-md-auto">
                            <p class="mb-0">
                                Made with<span class="fas fa-heart mx-1 text-danger"> </span>by <a
                                    class="text-decoration-none ms-1" href="https://themewagon.com/"
                                    target="_blank">ThemeWagon</a></p>
                        </div>
                    </div>
                </div>
            </div><!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->


    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    <div class="modal fade" id="popupVideo" tabindex="-1" aria-labelledby="popupVideo" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <iframe class="rounded" style="width:100%;height:500px;"
                    src="https://www.youtube.com/embed/_lhdhL4UDIo" title="YouTube video player"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="guest/vendors/@popperjs/popper.min.js"></script>
    <script src="guest/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="guest/vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="guest/vendors/fontawesome/all.min.js"></script>
    <script src="guest/assets/js/theme.js"></script>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Volkhov:wght@700&amp;display=swap"
        rel="stylesheet">

    <!-- datatable -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $('#search').select2();

        });
    </script>
</body>

</html>

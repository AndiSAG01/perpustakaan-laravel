<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Productly | Design Agency Landing Page UI</title>


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
                                            href="/dashboard">Dashboard</a></li>
                                @endif
                                <li class="nav-item"><a class="nav-link" aria-current="page" href="/guest">Presensi</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" aria-current="page"
                                        href="#validation">Customers</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" aria-current="page" href="#superhero">Pricing</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" aria-current="page" href="#marketing">Resources</a>
                                </li>
                            </ul>
                        @else
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item"><a class="nav-link" aria-current="page" href="/guest">Presensi</a>
                                </li>
                            </ul>
                            <div class="d-flex ms-lg-4">
                                <a class="btn btn-secondary-outline" href="{{ route('login') }}">Masuk</a>

                                @if (Route::has('register'))
                                    <a class="btn btn-secondary-outline"
                                        href="{{ route('register') }}">Daftar</a>
                                @endif
                            </div>
                        @endauth
                </div>
                @endif
            </div>
            </div>
        </nav>
        <section class="pt-7">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 text-md-start text-center py-6">
                        <h1 class="mb-4 fs-9 fw-bold">Hello Friends!!!</h1>
                        <p class="mb-6 lead text-secondary">Selamat datang di sistem informasi perpustakaan SMA Negeri
                            1 Kota Jambi! Kami memahami betapa pentingnya akses mudah dan cepat yang dibutuhkan. Oleh
                            karena itu, kami menyediakan sistem informasi perpustakaan yang intuitif dan mudah
                            digunakan.</p>
                        <div class="text-center text-md-start">
                            <a class="btn btn-warning me-3 btn-lg" href="/login" role="button">Masuk</a>
                        </div>
                    </div>
                    <div class="col-md-6 text-end"><img class="pt-7 pt-md-0 img-fluid"
                            src="guest/assets/img/hero/hero-img.png" alt="" /></div>
                </div>
            </div>
        </section>


        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="pt-5 pt-md-9 mb-6" id="feature">

            <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block"
                style="background-image:url(guest/assets/img/category/shape.png);opacity:.5;">
            </div>
            <!--/.bg-holder-->

            <div class="container">
                <h1 class="fs-9 fw-bold mb-4 text-center"> Sistem informasi dirancang dengan <br
                        class="d-none d-xl-block" />fitur menarik</h1>
                <div class="row">
                    <div class="col-lg-3 col-sm-6 mb-2"> <img class="mb-3 ms-n3"
                            src="guest/assets/img/category/icon1.png" width="75" alt="Feature" />
                        <h4 class="mb-3">Sistem yang kompatibel</h4>
                        <p class="mb-0 fw-medium text-secondary">Dapat digunakan dengan berbagai perangkat seperti
                            komputer, laptop, dan ponsel</p>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-2"> <img class="mb-3 ms-n3"
                            src="guest/assets/img/category/icon2.png" width="75" alt="Feature" />
                        <h4 class="mb-3">Pendaftaran anggota</h4>
                        <p class="mb-0 fw-medium text-secondary">Mudah dan cepat tanpa perlu datang langsung ke
                            perpustakaan</p>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-2"> <img class="mb-3 ms-n3"
                            src="guest/assets/img/category/icon3.png" width="75" alt="Feature" />
                        <h4 class="mb-3">Presensi pengunjung</h4>
                        <p class="mb-0 fw-medium text-secondary">Kamu dapat melakukan presensi langsung dari gadget
                            kamu</p>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-2"> <img class="mb-3 ms-n3"
                            src="guest/assets/img/category/icon4.png" width="75" alt="Feature" />
                        <h4 class="mb-3">Riwayat transaksi</h4>
                        <p class="mb-0 fw-medium text-secondary">Anggota dapat melihat riwayat transaksi perpustakaan
                            yang dilakukanya</p>
                    </div>
                </div>
                <div class="text-center"><a class="btn btn-warning" href="/register" role="button">Daftar
                        Sekarang</a>
                </div>
            </div><!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->




        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="pt-5" id="validation">

            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="text-secondary">Hak akses untuk</h5>
                        <h2 class="mb-2 fs-7 fw-bold">Anggota perpustakaan</h2>
                        <p class="mb-4 fw-medium text-secondary">
                            Anggota perpustakaan adalah siswa/i dan guru yang telah terdaftar dan memiliki hak akses
                            untuk menggunakan fasilitas dan layanan perpustakaan.
                        </p>
                        <h4 class="fs-1 fw-bold">Kartu anggota</h4>
                        <p class="mb-4 fw-medium text-secondary">Anggota perpustakaan dapat mencetak kartu anggota
                            perpustakaan langsung secara mandiri</p>
                        <h4 class="fs-1 fw-bold">Riwayar transaksi</h4>
                        <p class="mb-4 fw-medium text-secondary">Transaksi peminjaman dan pengambalian anda dapat
                            dilihat langsung dari gadget yang digunakan</p>
                        <h4 class="fs-1 fw-bold">Kelola profile</h4>
                        <p class="mb-4 fw-medium text-secondary">Profile mu dapat di ubah kapan pun dan dimanapun</p>
                    </div>
                    <div class="col-lg-6"><img class="img-fluid" src="guest/assets/img/validation/validation.png"
                            alt="" /></div>
                </div>
            </div><!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->




        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="pt-5" id="manager">

            <div class="container">
                <div class="row">
                    <div class="col-lg-6"><img class="img-fluid" src="guest/assets/img/manager/manager.png"
                            alt="" /></div>
                    <div class="col-lg-6">
                        <h5 class="text-secondary">Hak akses untuk</h5>
                        <p class="fs-7 fw-bold mb-2">Administrator perpustakaan</p>
                        <p class="mb-4 fw-medium text-secondary">
                            Administrator perpustakaan adalah staff yang bertanggung jawab untuk mengelola dan
                            menjalankan sistem informasi perpustakaan. Administrator perpustakaan dapat melakukan tugas
                            seperti mengelola koleksi buku, mengelola anggota perpustakaan, mengelola transaksi
                            peminjaan dan pengembalian. Petugas juga dapat melakukan hal-hal berikut
                        </p>
                        <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2"
                                src="guest/assets/img/manager/tick.png" width="35" alt="tick" />
                            <p class="fw-medium mb-0 text-secondary">Surat bebas perpustakaan</p>
                        </div>
                        <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2"
                                src="guest/assets/img/manager/tick.png" width="35" alt="tick" />
                            <p class="fw-medium mb-0 text-secondary">Cetak laporan </p>
                        </div>
                        <div class="d-flex align-items-center mb-3"><img class="me-sm-4 me-2"
                                src="guest/assets/img/manager/tick.png" width="35" alt="tick" />
                            <p class="fw-medium mb-0 text-secondary"> Akses penuh untuk mengelola aktivitas di
                                perpustakaan</p>
                        </div>
                    </div>
                </div>
            </div><!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->




        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="pt-5" id="marketer">

            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="text-secondary">Hak akses untuk</h5>
                        <p class="mb-2 fs-8 fw-bold">Pengunjung perpustakaan</p>
                        <p class="mb-4 fw-medium text-secondary">Kamu salah satunya? Yuk buruan daftar sekarang!</p>
                        <h4 class="fw-bold fs-1">Pendaftaran anggota</h4>
                        <p class="mb-4 fw-medium text-secondary">Mudah dan cepat tanpa perlu datang langsung ke
                            perpustakaan</p>
                        <h4 class="fw-bold fs-1">Presensi pengunjung perpustakaan</h4>
                        <p class="mb-4 fw-medium text-secondary">Jangan lupa presensi mu ketika mengunjungi
                            perpustakaan</p>

                    </div>
                    <div class="col-lg-6"><img class="img-fluid" src="guest/assets/img/marketer/marketer.png"
                            alt="" /></div>
                </div>
            </div><!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->




        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="py-md-11" id="superhero">

            <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block background-position-top"
                style="background-image:url(guest/assets/img/superhero/oval.png);opacity:.5; background-position: top !important ;">
            </div>
            <!--/.bg-holder-->

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h1 class="fw-bold mb-4 fs-7">Jangan lupa kunjungi website kami yang lain?</h1>
                    </div>
                </div>
            </div><!-- end of .container-->

        </section>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card"><img class="card-img border border-dark"
                            src="guest/assets/img/SMA-NEGERI-1-KOTA-JAMBI.png" alt="" />
                        <div class="card-body ps-0">
                            <h3>
                                <small>Website utama SMA Negeri 1 Kota Jambi</small> <br>
                                <a href="https://sman1jambi.sch.id/" class="btn btn-primary">Kunjungi sekarang</a>
                            </h3>
                        </div>
                    </div>
                </div>
                {{-- Tambah aplikasi --}}
            </div>
        </div><!-- end of .container-->

        <!-- <section> close ============================-->
        <!-- ============================================-->




        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="pb-2 pb-lg-5">

            <div class="container">
                <div class="row border-top border-top-secondary pt-7">
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-6 mb-lg-0 mb-sm-2 order-1 order-md-1 order-lg-1 text-center">
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
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-6 mb-lg-0 mb-sm-2 order-1 order-md-1 order-lg-1 text-center">
                        <img class="mb-4" src="guest/assets/img/logoSMA.jpg" width="100" alt="" />
                    </div>
                </div>
            </div><!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->




        <!-- ============================================-->
        <!-- <section> begin ============================-->
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

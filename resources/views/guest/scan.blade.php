<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style layout-menu-fixed" dir="ltr"
    data-theme="theme-default" data-assets-path="/assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SI Perpus</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon/favicon.ico" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="/assets/vendor/js/helpers.js"></script>

    <script src="/assets/js/config.js"></script>

    {{-- datatables --}}
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/dt-1.13.1/sp-2.1.0/datatables.min.css" />

    @cloudinaryJS

</head>


<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">


                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="https://api.dicebear.com/5.x/adventurer/svg?seed=Felix/{{ rand(1, 999) }}"
                                                            alt class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>

                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <h3 class="card-header text-center fw-bold">Detail Profil User</h3>
                                    <!-- Account -->
                                    <div class="card-body">
                                        <div class="d-flex justify-content-evenly align-items-start align-items-sm-center gap-4">
                                            <img src="{{ $user->photo ?? 'https://api.dicebear.com/5.x/adventurer/svg?seed=Felix' }}"
                                                class="d-block rounded" height="100" width="100"
                                                id="uploadedAvatar">
                                                <div class="border border-4 rounded">
                                                    {!! $chart->container() !!}
                                                </div>
                                        </div>
                                       
                                    </div>
                                    <hr class="my-0">
                                    <div class="card-body">
                                        <form id="formAccountSettings" method="POST" onsubmit="return false">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="noId" class="form-label">No. identitas</label>
                                                    <input class="form-control" type="text" id="noId"
                                                        name="noId" value="{{ $user->noId }}" readonly>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="name" class="form-label">Nama lengkap</label>
                                                    <input class="form-control" type="text" name="name"
                                                        id="name" value="{{ $user->name }}" readonly>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="email" class="form-label">E-mail</label>
                                                    <input class="form-control" type="text" id="email"
                                                        name="email" value="{{ $user->email }}" readonly>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="keanggotaan" class="form-label">Keanggotaan</label>
                                                    <input type="text" class="form-control" id="keanggotaan"
                                                        name="keanggotaan"
                                                        @if ($user->isAdmin == 1) value="Petugas Perpustakaan"
                            @else
                                value="Anggota Perpustakaan" @endif
                                                        readonly>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="birthday">Tanggal Lahir</label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="date" id="birthday" name="birthday"
                                                            class="form-control" value="{{ $user->birthday }}"
                                                            readonly>
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="gender" class="form-label">Jenis Kelamin</label>
                                                    <input type="text" class="form-control" id="gender"
                                                        name="gender"
                                                        @if ($user->denger == 1) value="Laki-Laki"
                            @else
                                value="Perempuan" @endif
                                                        readonly>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="address" class="form-label">alamat</label>
                                                    <input class="form-control" type="text" id="address"
                                                        name="address" value="{{ $user->address }}" readonly>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="telp" class="form-label">Telp</label>
                                                    <input type="text" class="form-control" id="telp"
                                                        name="telp" value="{{ $user->telp }}" readonly>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                    <!-- /Account -->
                                </div>
                            </div>
                        </div>



                    </div>

                    <!-- / Content -->
                </div>

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/assets/vendor/libs/popper/popper.js"></script>
    <script src="/assets/vendor/js/bootstrap.js"></script>
    <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    {{-- datatables --}}
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/sp-2.1.0/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

<script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}
{{ $chart2->script() }}
</body>

</html>

<!doctype html>
<html lang="en">

<head>
    <title>SMA Negeri 1 Kota Jambi</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- fontawesome -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,500&display=swap"
        rel="stylesheet">

        <!-- datatable -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        @keyframes move {
            100% {
                transform: translate3d(0, 0, 1px) rotate(360deg);
            }
        }

        .background {
            position: fixed;
            width: 100vw;
            height: 100vh;
            top: 0;
            left: 0;
            background: #3E1E68;
            overflow: hidden;
        }

        .background span {
            width: 37vmin;
            height: 37vmin;
            border-radius: 37vmin;
            position: absolute;
            animation: move;
            animation-duration: 45;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
        }


        .background span:nth-child(0) {
            color: #E45A84;
            top: 70%;
            left: 31%;
            animation-duration: 22s;
            animation-delay: -5s;
            transform-origin: 6vw -5vh;
            box-shadow: -74vmin 0 10.124163405960616vmin currentColor;
        }

        .background span:nth-child(1) {
            color: #E45A84;
            top: 55%;
            left: 53%;
            animation-duration: 26s;
            animation-delay: -15s;
            transform-origin: -20vw -23vh;
            box-shadow: -74vmin 0 9.449029580835122vmin currentColor;
        }

        .background span:nth-child(2) {
            color: #E45A84;
            top: 70%;
            left: 53%;
            animation-duration: 20s;
            animation-delay: -32s;
            transform-origin: 12vw 14vh;
            box-shadow: 74vmin 0 10.228427948949811vmin currentColor;
        }

        .background span:nth-child(3) {
            color: #FFACAC;
            top: 97%;
            left: 45%;
            animation-duration: 14s;
            animation-delay: -20s;
            transform-origin: 10vw -15vh;
            box-shadow: -74vmin 0 9.706110353001861vmin currentColor;
        }

        .background span:nth-child(4) {
            color: #583C87;
            top: 83%;
            left: 8%;
            animation-duration: 16s;
            animation-delay: -45s;
            transform-origin: 3vw -1vh;
            box-shadow: -74vmin 0 9.667526674567993vmin currentColor;
        }

        .background span:nth-child(5) {
            color: #E45A84;
            top: 86%;
            left: 22%;
            animation-duration: 16s;
            animation-delay: -38s;
            transform-origin: 2vw -24vh;
            box-shadow: -74vmin 0 10.071015756836484vmin currentColor;
        }

        .background span:nth-child(6) {
            color: #FFACAC;
            top: 56%;
            left: 40%;
            animation-duration: 21s;
            animation-delay: -34s;
            transform-origin: 12vw 21vh;
            box-shadow: 74vmin 0 9.35278597987688vmin currentColor;
        }

        .background span:nth-child(7) {
            color: #FFACAC;
            top: 39%;
            left: 92%;
            animation-duration: 25s;
            animation-delay: -41s;
            transform-origin: 23vw -23vh;
            box-shadow: -74vmin 0 9.348842608506523vmin currentColor;
        }

        .background span:nth-child(8) {
            color: #FFACAC;
            top: 68%;
            left: 20%;
            animation-duration: 18s;
            animation-delay: -6s;
            transform-origin: -8vw -18vh;
            box-shadow: 74vmin 0 9.401983180776524vmin currentColor;
        }

        #card {
            /* From https://css.glass */
            background: rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            margin: 100px 0 100px;
        }

        #card img {
            max-width: 150px;
        }

        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,500&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        .table{
            margin-top: 100px;
        }
    </style>
</head>

<body>
    <header>
        <div class="background">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </header>
    <main>
        <div class="container mt-5">
            @if ($message = Session::get('success'))
                <div class="text-center alert alert-primary alert-block">
                    <strong>{{ $message }}</strong>
                </div>
            @elseif ($errors->all())
                <div class="text-center alert alert-danger fw-bold" role="alert">Data is invalid 😣</div>
            @endif
        </div>
        <div class="container">
            <div class="card" id="card">
                <div class="card-body text-center">
                    <img src="https://static.schoolmedia.id/assets/socmed/NI/photo/profil-sman1kotajambi.jpg"
                        class="img-fluid rounded-circle" alt="logo">
                    <h2 class="card-title mt-4 fw-bold text-white">PERPUSTAKAAN SEKOLAH<br>SMA NEGERI 1 KOTA JAMBI</h2>
                    <nav class="nav justify-content-center gap-4 m-4">
                        @if (Route::has('login'))
                            @auth
                                <a id="btn" class="btn btn-outline-dark text-white btn-sm" href="/"><i
                                        class="fa-solid fa-house-chimney"></i> Home</a>
                            @else
                                <a id="btn" class="btn btn-outline-dark text-white btn-sm"
                                    href="{{ route('login') }}"><i class="fa-solid fa-house-user"></i> User</a>
                                <a id="btn" class="btn btn-outline-dark text-white btn-sm" href="/guest"><i
                                        class="fa-solid fa-door-open"></i> Input Pengunjung</a>
                                <a id="btn" class="btn btn-outline-dark text-white btn-sm" href="/idcard"><i
                                        class="fa-solid fa-address-card"></i> Cetak Kartu</a>
                            @endauth
                        @endif
                    </nav>
                </div>
                <div class="card-body">
                    {{ $slot }}
                </div>
            </div>
        </div>

    </main>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/21fb7efcbe.js" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

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

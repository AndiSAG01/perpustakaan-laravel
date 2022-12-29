<!doctype html>
<html lang="en">

<head>
    <title>{{ $user->user->name }} - SURAT BEBAS PUSTAKA</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<style>
    @media print {
        body {
            display: block;
        }

        title {
            text-transform: uppercase;
        }
    }
</style>

<body>
    <script>window.print()</script>
    <div class="border border-4 border-dark mx-5">
        <header>
            <div class="row text-center mt-4">
                <div class="col"></div>
                <div class="col-7 ">
                    <img src="https://static.schoolmedia.id/assets/socmed/NI/photo/profil-sman1kotajambi.jpg"
                        alt="logo" width="130" class="mb-3">
                    <h3 class="fw-bold">PERPUSTAKAAN SEKOLAH <br>SMA NEGERI 1 KOTA JAMBI</h3>
                </div>
                <div class="col"></div>
            </div>
        </header>
        <main>
            <div class="container mt-5 px-5">
                <div class="container-fluid">
                    <p>Dengan ini menerangkan dengan benar bahwa:</p>
                    <div class="table-responsive-sm px-5">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>NIS</td>
                                    <td>: {{ $user->user->noId }}</td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>: {{ Str::limit($user->user->name, 40, '...') }} </td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>: {{ $user->user->birthday }}<span class="invisible">Lorem ipsum dolor sit
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>: {{ Str::limit($user->user->address, 40, '...') }}</td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td>: {{ $user->class }}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <p>Bahwa siswa yang bersangkutan diatas dinyatakan telah bebas pustaka dengan persyaratan dan
                        ketentuan yang berlaku.</p>
                    <p>Demikian surat keterangan ini dibuat dengan sebenar-benarnya untuk digunakan semestinya.</p>
                </div>
            </div>
        </main>
        <footer>
            <div class="row">
                <div class="col"></div>
                <div class="col"></div>
                <div class="col-6 text-center mt-5 justify-content-end">
                    <p class="pb-4">...........................................<br>
                        {{ $user->position }}</p>
                    <p class="invisible">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, voluptates
                    </p>
                    <p>( {{ Str::limit($user->leaderName, 18, '...') }} )</p>
                    <p>NIP : {{ $user->noId }} </p>
                </div>
            </div>
        </footer>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>

<x-logApp>


    <!-- /Logo -->
    <h4 class="mb-2">Petualangan dimulai di sini 🚀</h4>
    <p class="mb-4">Jadikan manajemen aplikasi Anda mudah dan menyenangkan!</p>

    <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name') }}" required autocomplete="name" placeholder="Enter your name"
                autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}" required autocomplete="email"
                placeholder="Enter your email address">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="noId" class="form-label">No. Identitas</label>
            <input id="noId" type="number" class="form-control @error('noId') is-invalid @enderror" name="noId"
                value="{{ old('noId') }}" required autocomplete="noId" placeholder="Enter your noId" autofocus>

            @error('noId')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label> <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status"
                    id="siswa" value="0">
                <label class="form-check-label" for="siswa">Siswa/i</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="guru"
                value="1">
                <label class="form-check-label" for="guru">Guru</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="birthday" class="form-label">tanggal lahir</label>
            <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror"
                name="birthday" value="{{ old('birthday') }}" required autocomplete="birthday"
                placeholder="Enter your birthday" autofocus>

            @error('birthday')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Jenis Kelamin</label> <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="Laki-Laki" value="0">
                <label class="form-check-label" for="Laki-Laki">Laki-Laki</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="Perempuan" value="1">
                <label class="form-check-label" for="Perempuan">Perempuan</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">alamat</label>
            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                name="address" value="{{ old('address') }}" required autocomplete="address"
                placeholder="Enter your address" autofocus>

            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="telp" class="form-label">no. telp</label>
            <input id="telp" type="number" class="form-control @error('telp') is-invalid @enderror" name="telp"
                value="{{ old('telp') }}" required autocomplete="telp" placeholder="Enter your telp" autofocus>

            @error('telp')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3 form-password-toggle">
            <label class="form-label" for="password">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="new-password"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3 form-password-toggle">
            <label for="password-confirm" class="from-label">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                autocomplete="new-password"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;">
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="agree" value="option1" required>
            <label class="form-check-label" for="agree">Saya telah
                <a type="button" class="text-primary fw-bold" data-bs-toggle="modal"
                    data-bs-target="#modalScrollable">
                    membaca & menyetujui
                </a> atas persyaratan dan ketentuan yang berlaku.</label>
        </div>
        <button type="submit" class="btn btn-primary d-grid w-100">Sign up</button>

    </form>
    <p class="text-center">
        <span>Sudah punya akun?</span>
        <a href="{{ route('login') }}">
            <span class="fw-bold">Yuk masuk!</span>
        </a>
    </p>
    <!-- Register Card -->
    </div>
    </div>
    </div>
    <div class="modal fade" id="modalScrollable" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3 class="fw-bolder text-center text-uppercase">Syarat dan ketentuan yang berlaku</h3>

                    <hr>
                    <h4 class="text-center fw-bold">Persyaratan</h4>
                    <ol>
                        <li>Anggota perpustakaan di peruntukan untuk guru, siswa yang bertempat di SMA Negeri 1 Kota Jambi.</li>
                        <li>Menggunakan Nomor Induk Siswa Nasional (NISN) atau Nomor Unik Pendidik dan Tenaga Kependidikan (NUPTK) sebagai nomor identitas dari pendaftaran anggota perpustakaan.</li>
                        <li>Mengisi formulir pendaftaran dangan lengkap dan benar.</li>
                        <li>Cantumkan nomor telepon (WhatsApps) dan alamat email yang dapat dihubungi.</li>
                    </ol>
                    <hr>
                    <h4 class="text-center fw-bold">Tata tertib</h4>
                    <ol>
                        <li>Setiap anggota berhak mendapatkan dan memanfaatkan fasilitas layanan jasa perpustakaan dan informasi yang tersedia.</li>
                        <li>Pengunjung perpustakaan harus menjaga ketertiban dan kebersihan di dalam area perpustakaan.</li>
                        <li>Pengunjung perpustakaan harus mematuhi aturan penggunaan fasilitas perpustakaan yang tersedia.</li>
                        <li>Peminjaman buku hanya diperbolehkan bagi anggota perpustakaan yang telah terdaftar.</li>
                        <li>Dilarang membawa makanan dan minuman ke dalam perpustakaan.</li>
                        <li>Dilarang mengambil buku dari rak tanpa seizin petugas perpustakaan.</li>
                    </ol>
                    <hr>
                    <h4 class="text-center fw-bold">Hak dan kewajiban</h4>
                    <ol>
                        <li>Setiap anggota berhak mendapatkan dan memanfaatkan fasilitas layanan jasa perpustakaan dan informasi yang tersedia.</li>
                        <li>Siswa dapat meminjam maksimal 2 (dua) buku selama 1 (satu) minggu dengan memberikan identitas diri yang sah, seperti kartu anggota perpustakaan atau identitas lain yang disetujui oleh pihak perpustakaan.</li>
                        <li>Guru dapat meminjam maksimal 5 (lima) buku selama 2 (dua) minggu dengan memberikan identitas diri yang sah, seperti kartu anggota perpustakaan atau identitas lain yang disetujui oleh pihak perpustakaan.</li>
                        <li>Buku yang telah dipinjam harus dikembalikan tepat waktu dan dalam keadaan baik. Jika terjadi kerusakan atau hilang, maka peminjam harus mengganti buku tersebut dengan buku yang sama atau memberikan ganti rugi sesuai dengan harga buku.</li>
                        <li>Peminjaman buku dapat diperpanjang jika buku yang dipinjam belum habis masa peminjamannya dan tidak ada peminjam lain yang meminjam buku tersebut.</li>
                        <li>Perpustakaan berhak menolak permintaan peminjaman buku jika terdapat tunggakan peminjaman buku sebelumnya atau peminjam tidak mengikuti ketentuan-ketentuan yang ada di perpustakaan.</li>
                    </ol>
                    <hr>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">
                        Mengerti
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-logApp>

<x-logApp>

    <!-- /Logo -->
    <h4 class="mb-2">Tidak ingat kata sandi? 🔒</h4>
    <p class="mb-4">Masukkan email Anda dan kami akan mengirimkan instruksi untuk mengatur ulang kata sandi Anda</p>
    @if (session('status'))
        <div class="alert alert-primary" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form id="formAuthentication" class="mb-3" action="{{ route('password.email') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary d-grid w-100">Kirim ulang tuatan</button>
    </form>
    <div class="text-center d-flex justify-content-between">
        <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
            <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
            Kembali ke login
        </a>
        <a href="{{ route('register') }}" class="d-flex align-items-center justify-content-center">
            Kembali ke register
            <i class="bx bx-chevron-right scaleX-n1-rtl bx-sm"></i>
        </a>
    </div>
    </div>
    </div>
    <!-- /Register -->
    </div>
    </div>
    </div>

</x-logApp>

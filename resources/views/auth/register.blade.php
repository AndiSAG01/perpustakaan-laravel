<x-logApp>


            <!-- /Logo -->
            <h4 class="mb-2">Petualangan dimulai di sini 🚀</h4>
            <p class="mb-4">Jadikan manajemen aplikasi Anda mudah dan menyenangkan!</p>

            <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('register') }}">
              @csrf
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"  placeholder="Enter your name" autocomplete="name" autofocus>

                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
              </div>

              <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email address">

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
              </div>

              <div class="mb-3">
                <label for="noId" class="form-label">No. Identitas</label>
                      <input id="noId" type="number" class="form-control @error('noId') is-invalid @enderror" name="noId" value="{{ old('noId') }}" required autocomplete="noId"  placeholder="Enter your noId" autofocus>

                      @error('noId')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
              </div>

              <div class="mb-3">
                <label for="birthday" class="form-label">tanggal lahir</label>
                      <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" required autocomplete="birthday"  placeholder="Enter your birthday" autofocus>

                      @error('birthday')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
              </div>

              <div class="mb-3">
                <label for="gender" class="form-label">Jenis Kelamin</label> <br>
                <div class="form-check form-check-inline mt-3">
                    <input class="form-check-input" type="radio" name="gender"
                        id="Laki-Laki" value="0">
                    <label class="form-check-label" for="Laki-Laki">Laki-Laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="Perempuan"
                    value="1">
                    <label class="form-check-label" for="Perempuan">Perempuan</label>
                </div>
            </div>

              <div class="mb-3">
                <label for="address" class="form-label">alamat</label>
                      <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address"  placeholder="Enter your address" autofocus>

                      @error('address')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
              </div>

              <div class="mb-3">
                <label for="telp" class="form-label">no. telp</label>
                      <input id="telp" type="number" class="form-control @error('telp') is-invalid @enderror" name="telp" value="{{ old('telp') }}" required autocomplete="telp"  placeholder="Enter your telp" autofocus>

                      @error('telp')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
              </div>

              <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required>

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
              </div>

              <div class="mb-3 form-password-toggle">
                  <label for="password-confirm" class="from-label">{{ __('Confirm Password') }}</label>                        
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;">
              </div>
              <button type="submit" class="btn btn-primary d-grid w-100">Sign up</button>

          </form>
          <p class="text-center">
              <span>Sudah punya akun?</span>
              <a href="{{ route('login') }}">
                <span>Yuk masuk!</span>
              </a>
            </p>
            <!-- Register Card -->
          </div>
        </div>
      </div>
</x-logApp>

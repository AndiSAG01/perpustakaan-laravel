<x-layout>
    <div class="card-body">
        <div class="col-md-12">
          <div class="card mb-4">
            <h5 class="card-header">Profile Details</h5>
            <!-- Account -->
            <div class="card-body">
              <div class="d-flex align-items-start align-items-sm-center gap-4">
                <img src="../assets/img/avatars/1.png" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
                <div class="button-wrapper">
                  <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                    <span class="d-none d-sm-block">Upload new photo</span>
                    <i class="bx bx-upload d-block d-sm-none"></i>
                    <input type="file" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                  </label>

                  <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                </div>
              </div>
            </div>
            <br>
            <hr class="my-0">
            <div class="card-body">
              <form action="/profile/{{ Auth::user()->id }}" method="POST">
                @csrf
                @method('PUT') 
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="noId" class="form-label">No. identitas</label>
                    <input class="form-control" type="number" id="noId" name="noId" value="{{ Auth::user()->noId }}" autofocus="">
                    @error('noId')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="name" class="form-label">nama lengkap</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ Auth::user()->name }}">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input class="form-control" type="text" id="email" name="email" value="{{ Auth::user()->email }}" >
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="birthday" class="form-label">Tanggal lahir</label>
                    <input class="form-control" type="date" id="birthday" name="birthday" value="{{ Auth::user()->birthday }}">
                    @error('birthday')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="address" class="form-label">Alamat</label>
                    <input class="form-control" type="text" id="address" name="address" value="{{ Auth::user()->address }}">
                    @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="telp" class="form-label">Telp</label>
                    <input class="form-control" type="number" id="telp" name="telp" value="{{ Auth::user()->telp }}">
                    @error('telp')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                  </div>

                  <div class="mb-3 col-md-6">
                      <label for="gender">Jenis Kelamin</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="1" value="1" @if (Auth::user()->telp == true)
                            checked
                        @endif>
                        <label class="form-check-label" for="1">
                          Perempuan
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="0" value="0" @if (Auth::user()->telp == false)
                            checked
                        @endif>
                        <label class="form-check-label" for="0">
                          Laki-laki
                        </label>
                      </div>
                      @error('return')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                      
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="password" class="form-label">password</label>
                    <input class="form-control" type="password" id="password" name="password" >
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                  </div>
                  
                </div>
                <div class="mt-2">
                  <button type="submit" class="btn btn-primary me-2">Save changes</button>
                  <button type="reset" class="btn btn-danger me-2">Reset</button>
                  <a href="/profile/{id}/show" class="btn btn-secondary me-2">Close</a>    
            
                </div>
              </form>
            </div>
            <!-- /Account -->
          </div>
        </div>
      </div>
</x-layout>

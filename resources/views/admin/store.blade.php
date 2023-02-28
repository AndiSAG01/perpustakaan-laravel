<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#storeAdmin">
    Tambah administrator
</button>

<!-- Modal -->
<div class="modal fade" id="storeAdmin" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center fw-bold text-primary">Tambah administrator</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr>
            <form action="/admin" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col mb-3">
                        <label for="noId" class="form-label">no. identitas</label>
                        <input type="number" value="{{ old('noId') }}" id="noId" class="form-control"
                            name="noId" placeholder="Masukkan NIP ">
                        @error('noId')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="photo" class="form-label">Foto profile</label>
                        <input type="file" value="{{ old('photo') }}" id="photo" class="form-control"
                            name="photo" placeholder="Masukkan foto profile ">
                            <small class="text-danger">Optional, kosongkan jika tidak ada.</small>
                        @error('photo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="name" class="form-label">nama lengkap</label>
                        <input value="{{ old('name') }}" type="text" id="name" class="form-control"
                            name="name" placeholder="Masukkan nama lengkap">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="email" class="form-label">email</label>
                        <input value="{{ old('email') }}" type="text" id="email" class="form-control"
                            name="email" placeholder="Masukkan email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="birthday" class="form-label">tanggal lahir</label>
                        <input value="{{ old('birthday') }}" type="date" id="birthday" class="form-control"
                            name="birthday">
                        @error('birthday')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
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
                    <div class="col mb-3">
                        <label for="address" class="form-label">alamat</label>
                        <input type="text" id="address" class="form-control" value="{{ old('address') }}" name="address" placeholder="Masukkan alamat lengkap">
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="telp" class="form-label">telp</label>
                        <input type="number" id="telp" class="form-control" value="{{ old('telp') }}" name="telp" placeholder="Masukkan No. telp aktif atau wa">
                        @error('telp')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="password" class="form-label">password</label><br>
                        <input type="text" id="password" class="form-control" value="password" readonly>
                        <small class="text-warning">Default Password</small>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="hidden" name="isAdmin" value="1">
                    <input type="hidden" name="status" value="2">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
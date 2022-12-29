<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#storemember">
    Tambah User
</button>

<!-- Modal -->
<div class="modal fade" id="storemember" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/user" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="col mb-3">
                        <label for="noId" class="form-label">no. identitas</label>
                        <input type="number" value="{{ old('noId') }}" id="noId" class="form-control"
                            name="noId">
                        @error('noId')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="name" class="form-label">nama lengkap</label>
                        <input value="{{ old('name') }}" type="text" id="name" class="form-control"
                            name="name">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="email" class="form-label">email</label>
                        <input value="{{ old('email') }}" type="text" id="email" class="form-control"
                            name="email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="birthday" class="form-label">tanggal lahir</label>
                        <input value="{{ old('email') }}" type="date" id="birthday" class="form-control"
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
                        <input type="text" id="address" class="form-control" value="{{ old('address') }}" name="address">
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="telp" class="form-label">telp</label>
                        <input type="telp" id="telp" class="form-control" value="{{ old('telp') }}" name="telp">
                        @error('telp')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="password" class="form-label">password</label><br>
                        <small>Default Password</small>
                        <input type="text" id="password" class="form-control" value="password" readonly>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="isAdmin" class="form-label">Apakah user seorang Admin?</label> <br>
                        <div class="form-check form-check-inline mt-3">
                            <input class="form-check-input" type="radio" name="isAdmin" id="false"
                                value="0">
                            <label class="form-check-label" for="false">Bukan</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="isAdmin" id="true"
                                value="1">
                            <label class="form-check-label" for="true">Ya</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

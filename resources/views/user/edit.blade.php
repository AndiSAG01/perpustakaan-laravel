<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#storeUser">
    Edit
</button>

<!-- Modal -->
<div class="modal fade" id="storeUser" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center fw-bold text-primary">Edit anggota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr>
            <form action="/user/{{$user->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="col mb-3">
                        <label for="status" class="form-label">Status</label> <br>
                        <div class="form-check form-check-inline mt-3">
                            <input class="form-check-input" type="radio" name="status"
                                id="siswa" value="0" @if ($user->status == false){
                                    checked
                                }     
                                @endif>
                            <label class="form-check-label" for="siswa">Siswa/i</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="guru"
                            value="1" @if ($user->status == true){
                                checked
                            }     
                            @endif>
                            <label class="form-check-label" for="guru">Guru</label>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <label for="noId" class="form-label">no. identitas</label>
                        <input type="number" value="{{ $user->noId }}" id="noId" class="form-control"
                            name="noId" placeholder="Masukkan NIP ">
                        @error('noId')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="photo" class="form-label">Foto profile</label>
                        <input type="file" value="{{ $user->photo }}" id="photo" class="form-control"
                            name="photo" placeholder="Masukkan foto profile ">
                            <small class="text-danger">Optional, kosongkan jika tidak ada.</small>
                        @error('photo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="name" class="form-label">nama lengkap</label>
                        <input value="{{ $user->name }}" type="text" id="name" class="form-control"
                            name="name" placeholder="Masukkan nama lengkap">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="email" class="form-label">email</label>
                        <input value="{{ $user->email }}" type="text" id="email" class="form-control"
                            name="email" placeholder="Masukkan email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="birthday" class="form-label">tanggal lahir</label>
                        <input value="{{ $user->birthday }}" type="date" id="birthday" class="form-control"
                            name="birthday">
                        @error('birthday')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin</label> <br>
                        <div class="form-check form-check-inline mt-3">
                            <input class="form-check-input" type="radio" name="gender"
                                id="Laki-Laki" value="0" @if ($user->gender == false){
                                    checked
                                }     
                                @endif>
                            <label class="form-check-label" for="Laki-Laki">Laki-Laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="Perempuan"
                            value="1" @if ($user->gender == true){
                                checked
                            }     
                            @endif>
                            <label class="form-check-label" for="Perempuan">Perempuan</label>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <label for="address" class="form-label">alamat</label>
                        <input type="text" id="address" class="form-control" value="{{ $user->address }}" name="address" placeholder="Masukkan alamat lengkap">
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="telp" class="form-label">telp</label>
                        <input type="number" id="telp" class="form-control" value="{{ $user->telp }}" name="telp" placeholder="Masukkan No. telp aktif atau wa">
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
                    <input type="hidden" name="isAdmin" value="0">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

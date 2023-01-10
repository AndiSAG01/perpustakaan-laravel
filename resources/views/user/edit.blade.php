<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editedmember">
    Edit User
</button>

<!-- Modal -->
<div class="modal fade" id="editedmember" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/user/{{ $user->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="col mb-3">
                        <label for="noId" class="form-label">noId</label>
                        <input type="number" id="noId" class="form-control" value="{{ $user->noId }}"
                            name="noId">
                        @error('noId')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="name" class="form-label">name</label>
                        <input type="text" id="name" class="form-control" value="{{ $user->name }}"
                            name="name">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="email" class="form-label">email</label>
                        <input type="text" id="email" class="form-control" value="{{ $user->email }}"
                            name="email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="birthday" class="form-label">birthday</label>
                        <input type="date" id="birthday" class="form-control" value="{{ $user->birthday }}"
                            name="birthday">
                        @error('birthday')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin</label> <br>
                        <div class="form-check form-check-inline mt-3">
                            <input class="form-check-input" type="radio" name="gender" id="Laki-Laki" value="0"
                                @if ($user->gender == '0') checked @endif>
                            <label class="form-check-label" for="Laki-Laki">Laki-Laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="Perempuan"
                                @if ($user->gender == '1') checked @endif value="1">
                            <label class="form-check-label" for="Perempuan">Perempuan</label>
                        </div>

                    </div>
                    <div class="col mb-3">
                        <label for="address" class="form-label">address</label>
                        <input type="text" id="address" class="form-control" value="{{ $user->address }}"
                            name="address">
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="telp" class="form-label">telp</label>
                        <input type="telp" id="telp" class="form-control" value="{{ $user->telp }}"
                            name="telp">
                        @error('telp')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="isAdmin" class="form-label">Apakah user seorang Admin?</label> <br>
                        <div class="form-check form-check-inline mt-3">
                            <input class="form-check-input" type="radio" name="isAdmin" id="false"
                                value="0" @if ($user->isAdmin == false) checked @endif>
                            <label class="form-check-label" for="false">Bukan</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="isAdmin" id="true"
                                value="1" @if ($user->isAdmin == true) checked @endif>
                            <label class="form-check-label" for="true">Ya</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

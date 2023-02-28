<x-app>
    <div class="col-xxl">
        <div class="card">
            <h5 class="card-header text-primary fw-bold">Detail profile administrator</h5>
            <!-- Account -->
            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="{{$user->photo}}"
                        alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-outline-primary me-2 mb-4" tabindex="0">
                            <a href="{{ $user->photo }}" class="d-none d-sm-block fw-bold">Lihat</a>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload" class="account-file-input" hidden=""
                                accept="image/png, image/jpeg">
                        </label>
                        <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-body">
                <form action="/admin/{{ $user->id }}" method="POST">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-noId">no. identitas</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" name="noId" class="form-control" id="basic-icon-default-noId"
                                    value="{{ $user->noId }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-name">nama lengkap</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" name="name" class="form-control" id="basic-icon-default-name"
                                    value="{{ $user->name }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-email">email</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" name="email" class="form-control" id="basic-icon-default-email"
                                    value="{{ $user->email }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-birthday">tanggal lahir</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" name="birthday" class="form-control"
                                    id="basic-icon-default-birthday" value="{{ $user->birthday }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-gender">jenis kelamin</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" name="gender" class="form-control" id="basic-icon-default-gender"
                                    @if ($user->gender == '0') value="Laki-laki"
                                @else
                                value="Perempuan" @endif
                                    readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-address">alamat</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" name="address" class="form-control"
                                    id="basic-icon-default-address" value="{{ $user->address }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-telp">telp</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" name="telp" class="form-control" id="basic-icon-default-telp"
                                    value="{{ $user->telp }}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer d-flex gap-3">
                        <a class="btn btn-secondary" href="/admin" role="button">Back</a>
                        @include('admin.edit')
                        <form action="/admin/{{ $user->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app>
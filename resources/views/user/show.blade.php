<x-app>
    <div class="col-xxl">
        <div class="card">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <strong>{{ $message }}</strong>
                </div>
            @elseif ($errors->all())
                <div class="alert alert-danger fw-bold" role="alert">Data is invalid 😣</div>
            @endif
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Detail User</h5> <small class="text-muted float-end">Merged input
                    group</small>
            </div>
            <div class="card-body">
                <form action="/user/{{ $user->id }}" method="POST">
                    {{-- @csrf
                @method('PUT') --}}
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
                                    @if ($user->gender == '0')
                                    value="Laki-laki"
                                @else
                                value="Perempuan"
                                @endif readonly>
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
                        <a class="btn btn-secondary" href="/user" role="button">Back</a>
                        @include('user.edit')
                        <form action="/user/{{ $user->id }}" method="POST">
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

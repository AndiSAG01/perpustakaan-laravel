<x-app>
    <div class="col-xxl">
        <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <strong>{{ $message }}</strong>
                </div>
                @elseif ($errors->all())
                <div class="alert alert-danger fw-bold" role="alert">Data is invalid 😣</div>
                @endif
                <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Detail pengajuan peminjaman</h5> <small class="text-muted float-end">Merged input
                    group</small>
                </div>
                <div class="card-body">
                <form action="/confirmation/{{ $pending->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Kode Transaksi</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" name="transactionCode" class="form-control"
                                    id="basic-icon-default-fullname" value="{{ $pending->transactionCode }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Judul Buku</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge" >
                                <select class="form-select" name="book_id" aria-label="Disabled select example" disabled>
                                    <option selected value="{{ $pending->book->id}}">{{ $pending->book->title}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">nama peminjam</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" name="user_id" class="form-control"
                                    id="basic-icon-default-fullname" value="{{ $pending->user->name }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">denda/perhari</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" name="late_id" class="form-control"
                                    id="basic-icon-default-fullname" value="{{ $pending->late_id }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">tanggal
                            pengajuan</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="date" name="entry" class="form-control"
                                    id="basic-icon-default-fullname" value="{{ $pending->submission }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">tanggal pinjam</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="date" name="entry" class="form-control"
                                    id="basic-icon-default-fullname" value="{{ Carbon\carbon::now()->format('Y-m-d')}}">
                            </div>
                            @error('entry')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">tanggal kembali</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="date" name="return" class="form-control"
                                    id="basic-icon-default-fullname" value="{{ $pending->return }}" >
                            </div>
                            @error('return')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">telat</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" name="lateDay" class="form-control"
                                    id="basic-icon-default-fullname"
                                    @if (Carbon\carbon::now() > $pending->return) value="{{ carbon\carbon::parse($pending->return)->diffInDays(Carbon\carbon::now()) . ' Hari' }}"
                                    @else
                                        value="0 Hari" @endif
                                    readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Keterangan</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" name="description" class="form-control"
                                    id="basic-icon-default-fullname" value="{{ $pending->description }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">status</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" name="status" class="form-control"
                                    id="basic-icon-default-fullname"
                                    @if ($pending->status == false) value="Pinjam"
                                    @else
                                    value="Selesai" @endif
                                    readonly>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer d-flex gap-3">
                        <a href="/transaction" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        setTimeout(function() {

            // Closing the alert
            $('.alert').alert('close');
        }, 3000);
    </script>

</x-app>

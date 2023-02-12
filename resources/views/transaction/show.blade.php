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
                <h5 class="mb-0">Detail Transaksi</h5> <small class="text-muted float-end">Merged input
                    group</small>
            </div>
            <div class="card-body">
                <form action="/transaction/{{ $transaction->id }}" method="POST">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Kode Transaksi</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" name="transactionCode" class="form-control"
                                    id="basic-icon-default-fullname" value="{{ $transaction->transactionCode }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">judul Buku</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" name="book_id" class="form-control"
                                    id="basic-icon-default-fullname" value="{{ $transaction->book->title }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">nama peminjam</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" name="user_id" class="form-control"
                                    id="basic-icon-default-fullname" value="{{ $transaction->user->name }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">denda/perhari</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" name="late_id" class="form-control"
                                    id="basic-icon-default-fullname" value="Rp. {{ $transaction->late_id }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">tanggal pinjam</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" name="entry" class="form-control"
                                    id="basic-icon-default-fullname" value="{{ $transaction->entry }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">tanggal kembali</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" name="return" class="form-control"
                                    id="basic-icon-default-fullname" value="{{ $transaction->return }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">telat</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" name="lateDay" class="form-control"
                                    id="basic-icon-default-fullname" value="{{$transaction->lateDay}} Hari"
                                    readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Keterangan</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" name="description" class="form-control"
                                    id="basic-icon-default-fullname" value="{{ $transaction->description }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">status</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" name="status" class="form-control"
                                    id="basic-icon-default-fullname"
                                    @if ($transaction->status == false)
                                    value="Pinjam"
                                    @else
                                    value="Selesai"
                                    @endif
                                    readonly>
                            </div>
                        </div>
                    </div>
                
                    <div class="card-footer d-flex gap-3">
                        <a href="/transaction" class="btn btn-secondary">Back</a>
                        @include('transaction.edit')
                        <form action="/transaction/{{ $transaction->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
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
    
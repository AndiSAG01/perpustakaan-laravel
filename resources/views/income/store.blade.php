<x-app>
<div class="flex-grow-1 container-p">
<div class="row">
<!-- User Sidebar -->
<div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
<!-- User Card -->
<div class="card mb-4">
    <div class="card-body">
        <div class="user-avatar-section">
            <div class="mb-5 d-flex align-items-center flex-column">
                <img class="img-fluid rounded my-4" src="{{ $pay->user->photo }}" height="110"
                    width="110" alt="User avatar">
                <div class="user-info text-center">
                    <h4 class="mb-2">{{ $pay->user->name }}</h4>
                    <span class="badge bg-label-secondary">
                        @if ($pay->user->isAdmin == 0)
                            Anggota Perpustakaan
                        @else
                            Administrator
                        @endif
                    </span>
                </div>
            </div>
        </div>
        <h5 class="pt-3 mb-4 fw-bold">Detail user</h5>
        <div class="info-container">
            <ul class="list-unstyled">
                <li class="mb-3">
                    <span class="fw-bold me-2">Nama:</span>
                    <span>{{ $pay->user->name }}</span>
                </li>
                <li class="mb-3">
                    <span class="fw-bold me-2">Email:</span>
                    <span>{{ $pay->user->email }}</span>
                </li>
                <li class="mb-3">
                    <span class="fw-bold me-2">Status:</span>
                    <span>
                        @if ($pay->user->status == 0)
                            Siswa/i
                        @elseif ($pay->user->status == 1)
                            Guru
                        @else
                            Administrator
                        @endif
                    </span>
                </li>
                <li class="mb-3">
                    <span class="fw-bold me-2">Nomor Id:</span>
                    <span>{{ $pay->user->noId }}</span>
                </li>
                <li class="mb-3">
                    <span class="fw-bold me-2">Jenis Kelamin:</span>
                    <span>
                        @if ($pay->user->status == 0)
                            Laki-laki
                        @else
                            Perempuan
                        @endif
                    </span>
                </li>
                <li class="mb-3">
                    <span class="fw-bold me-2">Tanggal Lahir:</span>
                    <span>{{ $pay->user->birthday }}</span>
                </li>
                <li class="mb-3">
                    <span class="fw-bold me-2">Telp/WhatsApps:</span>
                    <span>
                        
                        {{ $pay->user->telp }}</span>
                </li>
                <li class="mb-3">
                    <span class="fw-bold me-2">Alamat:</span>
                    <span>{{ $pay->user->address }}</span>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="card mb-4">
    <h5 class="card-header fw-bold">Catatan Transaksi</h5>
    <div class="card-body info-container">
        <ul class="list-unstyled">
            <li class="mb-3">
                <span class="fw-bold me-2">Nama Peminjam:</span>
                <span>{{ $pay->user->name }}</span>
            </li>
            <li class="mb-3">
                <span class="fw-bold me-2">Buku yang dipinjam:</span>
                <span>{{ $pay->book->title }}</span>
            </li>
            <li class="mb-3">
                <span class="fw-bold me-2">Tanggal Pinjam:</span>
                <span>{{ $pay->entry }}</span>
            </li>
            <li class="mb-3">
                <span class="fw-bold me-2">Tanggal Kembali:</span>
                <span>{{ $pay->return }}</span>
            </li>
            <li class="mb-3">
                <span class="fw-bold me-2">Total Telat:</span>
                <span>{{ $pay->lateDay . ' hari' }}</span>
            </li>
            <li class="mb-3">
                <span class="fw-bold me-2">Status Transaksi:</span>
                <span>
                    @if ($pay->status == 0)
                    Pinjam
                    @elseif ($pay->status == 1)
                    Selesai                        
                    @endif
                </span>
            </li>
            <li class="mb-3">
                <span class="fw-bold me-2">Keterangan:</span>
                <span>{{ $pay->description }}</span>
            </li>  
        </ul>
    </div>
</div>
<!-- /Plan Card -->
</div>
<!--/ User Sidebar -->


<!-- User Content -->
<div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
<!-- Project table -->
<div class="card mb-4">
    <h3 class="card-header fw-bold">Bayar Denda</h3>
    <div class="card-body">
        <form action="/income" method="POST">
            @csrf
            <div class="mb-3">
                <label class="col-form-label" for="basic-icon-default-fullname">Nama
                    Lengkap</label>
                <div class="col-sm">
                    <div class="input-group input-group-merge">
                        <select class="form-select" name="transaction_id">
                            <option value="{{ $pay->id }}" selected>{{ $pay->user->name }}
                            </option>
                        </select>
                    </div>
                    @error('transaction_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label class="col-form-label" for="basic-icon-default-date">Denda</label>
                <div class="col-sm">
                    <div class="input-group input-group-merge">
                        <input type="number" class="form-control" id="basic-icon-default-date"
                            name="count"
                            value="{{ $pay->lateDay * $pay->late->body }}">
                    </div>
                    @error('count')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label class="col-form-label" for="basic-icon-default-date">Keterangan</label>
                <div class="col-sm">
                    <div class="input-group input-group-merge">
                        <textarea class="form-control" name="description" id="description" rows="4">{{ old('description') }}</textarea>
                    </div>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
<!-- /Project table -->

<!-- Activity Timeline -->
<div class="card mb-4 overflow-auto" style="height: 550px">
    <div class="card-body">
        <small class="text-light fw-semibold mb-3">TIMELINE</small>
        @php
            $transactionBook = \App\Models\Transaction::where('user_id', $pay->user->id)
                ->orderby('created_at', 'Desc')
                ->get();
        @endphp
        <ul class="d-inline">
            <ul>
                @foreach ($transactionBook as $item)
                    <li class="timeline-item timeline-item-transparent mb-4">
                        <div class="timeline-event">
                            <div class="timeline-header mb-1">
                                <h6 class="mb-0">{{ $item->user->name }}</h6>
                            </div>
                            @if ($item->status == 0)
                                <strong class="mb-2 text-primary">Dipinjam <small
                                        class="text-muted">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</small></strong>
                            @elseif ($item->status == 1)
                                <strong class="mb-2 text-success">Dikembalikan <small
                                        class="text-muted">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</small></strong>
                            @elseif ($item->status == 2)
                                <strong class="mb-2 text-warning">Permintaan pinjam <small
                                        class="text-muted">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</small></strong>
                            @elseif ($item->status == 3)
                                <strong class="mb-2 text-danger">Permintaan ditolak <small
                                        class="text-muted">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</small></strong>
                            @endif
                            <div class="d-flex flex-wrap">
                                <div>
                                    <h6 class="mb-0">{{ $item->description }}</h6>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </ul>
    </div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
setTimeout(function() {

// Closing the alert
$('.alert').alert('close');
}, 5000);
</script>
</x-app>

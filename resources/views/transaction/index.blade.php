<x-translayout>
<div class="card-body">

@if ($message = Session::get('success'))
<div class="alert alert-primary alert-block">
<strong>{{ $message }}</strong>
</div>
@elseif ($errors->all())
<div class="alert alert-danger fw-bold" role="alert">Data is invalid 😣</div>
@endif
<div class="col-xxl d-none d-none">
<div class="card mb-4">
<div class="card-header d-flex align-items-center justify-content-between">
    <h5 class="mb-0">Form Denda Keterlambantan</h5>
</div>
<div class="card-body">
    <form action="/late/{id}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Denda
                Perhari</label>
            <div class="col-sm-10">
                <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                            class="bx bx-food-menu"></i></span>
                    <input type="number" name="body" class="form-control"
                        id="basic-icon-default-fullname" value="{{ $late->body ?? '' }}"
                        placeholder="Denda Belum diatur">
                </div>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row justify-content-end">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
{{-- form --}}
@include('transaction.store')
{{-- endform --}}
<h5 class="card-header text-center">Data Transaksi </h5>
<div class="nav-align-top mb-4 ">

<ul class="nav nav-pills mb-3 justify-content-center" role="tablist">
<li class="nav-item" role="presentation">
    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
        data-bs-target="#navs-pills-top-Pending" aria-controls="navs-pills-top-Pending"
        aria-selected="true">Tertunda</button>
</li>
<li class="nav-item" role="presentation">
    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
        data-bs-target="#navs-pills-top-Peminjaman" aria-controls="navs-pills-top-Peminjaman"
        aria-selected="true">Peminjaman</button>
</li>
<li class="nav-item" role="presentation">
    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
        data-bs-target="#navs-pills-top-Pengembalian" aria-controls="navs-pills-top-Pengembalian"
        aria-selected="false" tabindex="-1">Pengembalian</button>
</li>
</ul>

<div class="tab-content mt-2">
<div class="tab-pane fade show active" id="navs-pills-top-Pending" role="tabpanel">
    <div class="table-responsive text-nowrap">
        <table id="myTable" class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>no. transaksi</th>
                    <th>nama Peminjam</th>
                    <th>Buku dipinjam</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Tanggal pinjam</th>
                    <th>tanggal kembali</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($pending as $no => $item)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $item->transactionCode }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->book->title }}</td>
                        <td>{{ $item->submission ?? '-' }}</td>
                        <td>{{ $item->entry ?? '-' }}</td>
                        <td>{{ $item->return ?? '-' }}</td>
                        <td>
                            @if ($item->status == 2)
                                <span class="badge bg-label-warning me-1">tertunda</span>
                            @elseif ($item->status == 0)
                                <span class="badge bg-label-danger me-1">Pinjam</span>
                            @elseif ($item->status == 3)
                                <span class="badge bg-label-secondary me-1">Ditolak</span>
                            @else
                                <span class="badge bg-label-primary me-1">Selesai</span>
                            @endif
                        </td>
                        {{-- <td>
                            @if ($now > $item->return)
                                {{ carbon\carbon::parse($item->return)->diffInDays($now) . ' Hari' }}
                            @else
                                0 Hari
                            @endif
                        </td> --}}
                        <td class="d-flex gap-1">
                            <a href="/transaction/{{ $item->id }}/confirmation"
                                class="btn btn-warning btn-sm">Konfirmasi</a>
                                <form action="/reject/{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                                </form>
                            <a href="/transaction/{{ $item->id }}/show"
                                class="btn btn-info btn-sm">Lihat</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="tab-pane fade" id="navs-pills-top-Peminjaman" role="tabpanel">
    <div class="table-responsive text-nowrap">
        <table id="myTable" class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>no. transaksi</th>
                    <th>nama Peminjam</th>
                    <th>Buku dipinjam</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Tanggal pinjam</th>
                    <th>tanggal kembali</th>
                    <th>Status</th>
                    <th>Telat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($entry as $no => $item)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $item->transactionCode }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->book->title }}</td>
                        <td>{{ $item->submission ?? '-' }}</td>
                        <td>{{ $item->entry ?? '-' }}</td>
                        <td>{{ $item->return ?? '-' }}</td>
                        <td>
                            @if ($item->status == 2)
                            <span class="badge bg-label-warning me-1">tertunda</span>
                        @elseif ($item->status == 0)
                            <span class="badge bg-label-danger me-1">Pinjam</span>
                        @elseif ($item->status == 3)
                            <span class="badge bg-label-secondary me-1">Ditolak</span>
                        @else
                            <span class="badge bg-label-primary me-1">Selesai</span>
                        @endif
                        </td>
                        <td>
                            @if ($now > $item->return)
                                {{ carbon\carbon::parse($item->return)->diffInDays($now) . ' Hari' }}
                            @else
                                0 Hari
                            @endif
                        </td>
                        <td class="d-flex gap-1">
                            <form action="/ended/{{ $item->id }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Selesai</button>
                            </form>
                            <a href="/transaction/{{ $item->id }}/show"
                                class="btn btn-info btn-sm">Lihat</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="tab-pane fade" id="navs-pills-top-Pengembalian" role="tabpanel">
    <div class="table-responsive text-nowrap">
        <table id="myTable" class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>no. transaksi</th>
                    <th>nama Peminjam</th>
                    <th>Buku dipinjam</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Tanggal pinjam</th>
                    <th>tanggal kembali</th>
                    <th>Status</th>
                    <th>Telat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($return as $no => $item)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $item->transactionCode }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->book->title }}</td>
                        <td>{{ $item->submission ?? '-' }}</td>
                        <td>{{ $item->entry ?? '-' }}</td>
                        <td>{{ $item->return ?? '-' }}</td>
                        <td>
                            @if ($item->status == 2)
                                <span class="badge bg-label-warning me-1">tertunda</span>
                            @elseif ($item->status == 0)
                                <span class="badge bg-label-danger me-1">Pinjam</span>
                            @elseif ($item->status == 3)
                                <span class="badge bg-label-secondary me-1">Ditolak</span>
                            @else
                                <span class="badge bg-label-primary me-1">Selesai</span>
                            @endif
                        </td>
                        <td>
                            @if ($now > $item->return)
                                {{ carbon\carbon::parse($item->return)->diffInDays($now) . ' Hari' }}
                            @else
                                0 Hari
                            @endif
                        </td>
                        <td class="d-flex gap-1">
                            <a href="/transaction/{{ $item->id }}/show"
                                class="btn btn-info btn-sm">Lihat</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
setTimeout(function() {

// Closing the alert
$('.alert').alert('close');
}, 3000);
</script>
</x-translayout>

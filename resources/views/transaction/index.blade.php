<x-translayout>

@if ($message = Session::get('success'))
<div class="alert alert-primary alert-block">
<strong>{{ $message }}</strong>
</div>
@elseif($message = Session::get('fail'))
<div class="alert alert-danger fw-bold alert-block">
{{ $message }}
</div>
@elseif ($errors->all())
<div class="alert alert-danger fw-bold alert-block" role="alert">Data is invalid 😣</div>
@endif
<div class="card p-3 mb-3 fw-bold">
<h3 class="fw-bold">TRANSAKSI</h3>
Halaman ini berisi informasi penting mengenai transaksi perpustakaan. Mohon pastikan bahwa setiap tindakan yang Anda lakukan sesuai dengan ketentuan dan aturan yang berlaku. Kami tidak bertanggung jawab atas segala tindakan yang melanggar ketentuan yang telah ditetapkan.
</div>


@include('transaction.store')

<div class="card">
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
<div class="card-body">
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
                        <td class="d-flex gap-1">
                            <a href="/transaction/{{ $item->id }}/confirmation"
                                class="btn btn-warning btn-sm"><i class='bx bx-check-double'></i> Konfirmasi</a>
                            <form action="/reject/{{ $item->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger btn-sm"><i class='bx bx-x-circle'></i> Tolak</button>
                            </form>
                            <a href="/transaction/{{ $item->id }}/show"
                                class="btn btn-info btn-sm"><i class='bx bx-show-alt'></i> Lihat</a>
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
                            {{ $item->lateDay }} Hari
                        </td>
                        <td class="d-flex gap-1">
                            @if ($item->lateDay == 0)
                                <form action="/ended/{{ $item->id }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="btn btn-success btn-sm"><i class='bx bx-calendar-check'></i> Selesai</button>
                                </form>
                            @else
                                <a href="/income/{{ $item->id }}/pay"
                                    class="btn btn-danger btn-sm"><i class='bx bx-money'></i> Bayar</a>
                            @endif
                            <a href="/transaction/{{ $item->id }}/show"
                                class="btn btn-info btn-sm"><i class='bx bx-show-alt'></i> Lihat</a>
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
                    <th>Keterangan</th>
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
                            {{ $item->lateDay }} Hari
                        </td>
                        <td>
                            {{ $item->description }}
                        </td>
                        <td class="d-flex gap-1">
                            <a href="/transaction/{{ $item->id }}/show"
                                class="btn btn-info btn-sm"><i class='bx bx-show-alt'></i> Lihat</a>
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
</div>
<script type="text/javascript">
setTimeout(function() {

// Closing the alert
$('.alert').alert('close');
}, 5000);
</script>
</x-translayout>

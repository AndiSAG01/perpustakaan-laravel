<x-report>
    <div class="card-body">
        <h3 class="card-header text-center">Table Peminjaman Buku</h3>
<div class="table-responsive text-nowrap">
    <button class="btn btn-outline-primary d-print-none" onClick="window.print()"><i class='bx bxs-printer' ></i>
    </button>
    <table id="myTable" class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>no. transaksi</th>
                <th>nama Peminjam</th>
                <th>Buku dipinjam</th>
                <th>Tanggal pinjam</th>
                <th>tanggal kembali</th>
                <th>Status</th>
                <th>Telat</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">   
            @foreach ($transactions as $no => $item)
                <tr>
                    <td>{{ ++$no }}</td>
                    <td>{{ $item->transactionCode }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->book->title }}</td>
                    <td>{{ $item->entry }}</td>
                    <td>{{ $item->return }}</td>
                    <td>@if ($item->status == false)
                        Dipinjam
                    @else
                        Selesai
                    @endif</td>
                    <td>{{ $item->lateDay }}</td>
                    <td>{{ $item->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div>
</x-report>
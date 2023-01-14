<x-layout>
    <div class="card-body">
        <h5 class="card-header fw-bold text-center">Table Transaksi Buku</h5>
        <div class="table-responsive text-nowrap">
            <table id="myTable" class="table text-center">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode transaksi</th>
                        <th>judul buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>status</th>
                        <th>denda</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($history as $no => $item)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->book->title }}</td>
                            <td>{{ $item->entry }}</td>
                            <td>{{ $item->return }}</td>
                            <td>
                                @if ($item->status == false)
                                    Pinjam
                                @else
                                    Selesai
                                @endif
                            </td>
                            <td>{{ $item->LateDay ?? '-' }}</td>
                            <td>{{ $item->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>

<x-report>
    <x-slot name="title">{{ $title }}</x-slot>
    <div class="card-body">
        <h3 class="card-header fw-bold text-center">{{ $title }}</h3>
        <div class="table-responsive text-nowrap" id="printableArea">
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
                            <td>
                                @if ($item->status == false)
                                    Dipinjam
                                @else
                                    Selesai
                                @endif
                            </td>
                            <td>{{ $item->lateDay }} hari</td>
                            <td>{{ $item->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function printPageArea(areaID) {
            var printContent = document.getElementById(areaID).innerHTML;
            var originalContent = document.body.innerHTML;
            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = originalContent;
        }
    </script>
</x-report>

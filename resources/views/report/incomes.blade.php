<x-report>
    <x-slot name="title">{{ $title }}</x-slot>
    <div class="card-body">
        <h3 class="card-header fw-bold text-center">{{ $title }}</h3>
        <div class="table-responsive text-nowrap" id="printableArea">
            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Lengkap</th>
                        <th>Buku yang dipinjam</th>
                        <th>Tanggal Bayar</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($incomes as $no => $item)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $item->transaction->user->name }}</td>
                            <td>{{ $item->transaction->book->title }}</td>
                            <td>{{ $item->date }}</td>
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

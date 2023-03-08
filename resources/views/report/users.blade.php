<x-report>
    <div class="card-body">
        <h3 class="card-header fw-bold text-center">{{ $title }}</h3>
        <div class="table-responsive text-nowrap" id="printableArea">

            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>No Identitas</th>
                        <th>Nama Lengkap</th>
                        <th>email</th>
                        <th>tanggal lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Keanggotaan</th>
                        <th>alamat</th>
                        <th>telp</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($users as $no => $item)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $item->noId }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->birthday }}</td>
                            <td>@if ($item->gender == '0')
                                Laki-laki
                            @else
                                Perempuan
                            @endif</td>
                            <td>
                                @if ($item->status == 0)
                                            Siswa/i
                                        @elseif ($item->status == 1)
                                            Guru
                                        @elseif ($item->status == 2)
                                            Administrator
                                        @endif
                            </td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->telp }}</td>  
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
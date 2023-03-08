<x-layout>
    <div class="card-body">
        <a class="text-primary" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="" data-bs-original-title="<span>Pengajuan peminjaman buku dibatasi hingga 2 kali untuk mengurangi penumpukan antrian</span>"><i class='bx bx-bell bx-xl fs-3' ></i></a>
        @if ($message = Session::get('success'))
        <div class="alert alert-primary alert-block">
            <strong>{{ $message }}</strong>
        </div>
    @elseif ($errors->all())
        <div class="alert alert-danger fw-bold" role="alert">Data is invalid 😣</div>
    @endif
        
        @include('member.borrow')
        <h5 class="card-header fw-bold text-center">Transaksi Peminjaman Anggota</h5>
        <div class="table-responsive text-nowrap">
            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode transaksi</th>
                        <th>judul buku</th>
                        <th>Tanggal Pengajuan</th>
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
                            <td>{{ $item->submission ?? '-' }}</td>
                            <td>{{ $item->entry ?? '-' }}</td>
                            <td>{{ $item->return ?? '-' }}</td>
                            <td>
                                @if ($item->status == 0)
                                    Pinjam
                                @elseif ($item->status == 1)
                                Selesai
                                @else
                                Menunggu Konfirmasi
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
    <script type="text/javascript">
        setTimeout(function() {

            // Closing the alert
            $('.alert').alert('close');
        }, 3000);
    </script>
</x-layout>

<x-layout>
    <div class="d-flex align-items-end row">
        <div class="col">
            <div class="card-body">
                <h5 class="card-title text-primary">Welcome {{ Auth::user()->name }}! 🎉</h5>
                @if (session('status'))
                    <p class="mb-4">
                        {{ session('status') }}
                        {{ __('You are logged in!') }}
                    </p>
                @endif
            </div>
        </div>
        <div class="col-sm-5 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-4">
                <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User"
                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                    data-app-light-img="illustrations/man-with-laptop-light.png">
            </div>
        </div>
    </div>
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
                    @foreach ($transaction as $no => $item)
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

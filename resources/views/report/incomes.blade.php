<x-report>
    <div class="card-body">
        <h3 class="card-header text-center">Table Pembayaran Denda Buku</h3>
<div class="table-responsive text-nowrap">
    <button class="btn btn-outline-primary d-print-none" onClick="window.print()"><i class='bx bxs-printer' ></i>
    </button>
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
</x-report>
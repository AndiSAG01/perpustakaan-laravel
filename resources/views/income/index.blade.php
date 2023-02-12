<x-app>
    <div class="card-body">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @elseif ($errors->all())
            <div class="alert alert-danger fw-bold" role="alert">Data is invalid 😣</div>
        @endif
        <h5 class="card-header fw-bold text-center">Data Denda</h5>
        <div class="table-responsive text-nowrap">
            <table id="myTable" class="table text-center">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Lengkap</th>
                        <th>Tanggal Bayar</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($incomes as $no => $item)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $item->transaction->user->name }}</td>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->description }}</td>
                            <td class="d-flex gap-1"><a href="/income/{{ $item->id }}/edit"
                                    class="btn btn-warning">Edit</a>
                                <form action="/income/{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                </form>
                            </td>
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
</x-app>

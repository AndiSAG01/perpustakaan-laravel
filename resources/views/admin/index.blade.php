<x-app>
    <div class="card-body">
        @if ($message = Session::get('success'))
            <div class="alert alert-primary alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @elseif ($errors->all())
            <div class="alert alert-danger fw-bold" role="alert">Data is invalid 😣</div>
        @endif
        <div class="card-header">
            <h5 class="fw-bold text-center">Data administrator</h5>
            <div class="col">
                @include('admin.store')

            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>No Identitas</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Keanggotaan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($users as $no => $item)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $item->noId }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                @if ($item->gender == '0')
                                    Laki-laki
                                @else
                                    Perempuan
                                @endif
                            </td>
                            <td>
                                @if ($item->isAdmin == true)
                                    Admin
                                @else
                                    Anggota
                                @endif
                            </td>

                            <td class="d-flex gap-1">
                                <a href="/admin/{{ $item->id }}/show" class="btn btn-info btn-sm">Show</a>
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

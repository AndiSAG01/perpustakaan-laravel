<x-app>
    @if ($message = Session::get('success'))
        <div class="alert alert-primary alert-block">
            <strong>{{ $message }}</strong>
        </div>
    @elseif ($errors->all())
        <div class="alert alert-danger fw-bold" role="alert">Data is invalid 😣</div>
    @endif
    <div class="card p-3 mb-3 fw-bold">
        <h3 class="fw-bold">ADMINISTRATOR</h3>
        Anda sedang mengakses halaman administrator. Mohon pastikan bahwa tindakan yang Anda lakukan sesuai dengan
        aturan dan kebijakan perpustakaan.
    </div>
    <div class="col mb-3">
        @include('admin.store')
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="text-center">Data Administrator</h5>
        </div>
        <div class="card-body">
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
                                    Administrator
                                </td>

                                <td class="d-flex gap-1">
                                    <a href="/admin/{{ $item->id }}/show" class="btn btn-info btn-sm"><i
                                            class='bx bx-show-alt'></i> Lihat</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        setTimeout(function() {

            // Closing the alert
            $('.alert').alert('close');
        }, 5000);
    </script>
</x-app>

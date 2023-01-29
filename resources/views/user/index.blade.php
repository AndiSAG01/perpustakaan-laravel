<x-app>
    <div class="card-body">
        @if ($message = Session::get('success'))
            <div class="alert alert-primary alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @elseif ($errors->all())
            <div class="alert alert-danger fw-bold" role="alert">Data is invalid 😣</div>
        @endif
        <div class="container-fluid">
            <div class="row">
              <div class="col">
                @include('user.store')
            </div>
              <div class="col">
                {{-- <form action="/user/excel" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="file" name="file" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-primary" type="submit" id="button-addon2">Import</button>
                    </div>
                </form> --}}
                
              </div>
            </div>
          </div>
        <h5 class="card-header fw-bold text-center">Data User</h5>
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
                            <td>@if ($item->gender == '0')
                                Laki-laki
                            @else
                                Perempuan
                            @endif</td>
                            <td>
                                @if ($item->isAdmin == true)
                                    Admin
                                @else
                                    Anggota
                                @endif
                            </td>

                            <td class="d-flex gap-1">
                                <a href="/user/{{ $item->id }}/show" class="btn btn-info btn-sm">Show</a>
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

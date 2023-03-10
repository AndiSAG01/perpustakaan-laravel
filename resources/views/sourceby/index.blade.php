<x-app>
    <div class="card-body">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @elseif ($errors->all())
            <div class="alert alert-danger fw-bold" role="alert">Data is invalid 😣</div>
        @endif
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <p class="modal-title p-3 rounded alert-warning">
                        <strong>Peringatan!!!</strong> Pastikan data yang diinputkan lengkap dan tidak ada informasi
                        yang terlewatkan.
                    </p>
                </div>
                <div class="card-body">
                    <form action="/source" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-code">Asal buku</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-code2" class="input-group-text"><i
                                            class="bx bx-hash"></i></span>
                                    <input type="text" class="form-control" id="basic-icon-default-code"
                                        name="body" placeholder="Contoh Kategori" required>
                                </div>
                                @error('body')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <h5 class="card-header fw-bold text-center">Data Kategori Buku</h5>
        <div class="table-responsive text-nowrap">
            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Kategori</th>
                        <th>Nama Kategori</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($categories as $no => $item)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->name }}</td>
                            <td class="d-flex gap-1"><a href="/source/{{ $item->id }}/edit"
                                    class="btn btn-warning btn-sm"><i class="bx bx-edit-alt bx-xs"></i> Edit</a>
                                <form action="/source/{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit"><i
                                            class="bx bx-trash-alt bx-xs"></i> Hapus</button>
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
        }, 5000);
    </script>
</x-app>

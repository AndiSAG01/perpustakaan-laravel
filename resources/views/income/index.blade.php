<x-translayout>
    @if ($message = Session::get('success'))
        <div class="alert alert-primary alert-block">
            <strong>{{ $message }}</strong>
        </div>
    @elseif ($errors->all())
        <div class="alert alert-danger fw-bold" role="alert">Data is invalid 😣</div>
    @endif
    <div class="col">
        <div class="card p-3 mb-3 fw-bold">
            <h3 class="fw-bold">DENDA</h3>
            Anda sedang mengakses halaman denda. Mohon pastikan bahwa tindakan yang Anda lakukan sesuai dengan
            aturan dan kebijakan perpustakaan.
        </div>

        <div class="row gap-3">
            <div class="col">
                <div class="card">
                    <div class="card-header align-items-center">
                        <div class="container mb-4 py-2 rounded  alert-warning">
                            <strong>Perhatian!!!</strong> Perubahan nominal denda dapat mengubah semua transaksi yang sedang terjadi.
                        </div>
                        <h5 class="mb-0">Atur Denda Keterlambatan</h5>
                    </div>
                    <div class="card-body">
                        <form action="/late/{{ $lates->Id }}" method="POST">
                            @csrf
                            @method('PUT')
                                <div class="col mb-3">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-food-menu"></i></span>
                                        <input type="number" name="body" class="form-control"
                                            id="basic-icon-default-fullname" value="{{ $lates->body }}"
                                            placeholder="Denda Belum diatur">
                                    </div>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-warning"><i class='bx bx-edit'></i> Ubah</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card gap-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-1">
                            <h6 class="fw-normal">Total {{ $countUsers }} Anggota</h6>
                            <ul class="list-unstyled d-flex align-items-center avatar-group mb-0"> @php $countImage = 0 @endphp
                                @foreach ($personal as $item)
                                    @if ($countImage < 5)
                                        <!-- Jumlah gambar maksimal -->
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-sm pull-up" aria-label="{{ $item->user->name }}"
                                            data-bs-original-title="{{ $item->user->name }}">
                                            <img class="rounded-circle" src="{{ $item->user->photo }}" alt="Avatar">
                                        </li>
                                        @php $countImage++ @endphp
                                        <!-- Counter ditambah 1 -->
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="d-flex justify-content-between align-items-end">
                            <div class="role-heading">
                                <h4 class="mb-1">Terkena denda</h4>
                                <a href="/transaction"><small>Lihat</small></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-1">
                            <h6 class="fw-normal">Total {{ $countMoney }}</h6>
                            <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                @php $countPhoto = 0 @endphp
                                @foreach ($incomes as $item)
                                    @if ($countPhoto < 5)
                                        <!-- Jumlah gambar maksimal -->
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-sm pull-up"
                                            aria-label="{{ $item->transaction->user->name }}"
                                            data-bs-original-title="{{ $item->transaction->user->name }}">
                                            <img class="rounded-circle" src="{{ $item->transaction->user->photo }}"
                                                alt="Avatar">
                                        </li>
                                        @php $countPhoto++ @endphp
                                        <!-- Counter ditambah 1 -->
                                    @endif
                                @endforeach

                            </ul>
                        </div>
                        <div class="d-flex justify-content-between align-items-end">
                            <div class="role-heading">
                                <h4 class="mb-1">Denda terkumpul</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-3">
        <div class="nav-align-top mb-4">
            <div class="card-header">
                <h5 class="text-center">Data denda</h5>
                <ul class="nav nav-pills mb-3 justify-content-center" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-pills-top-telat" aria-controls="navs-pills-top-telat"
                            aria-selected="true">Terlambat</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-pills-top-selesai" aria-controls="navs-pills-top-selesai"
                            aria-selected="true">Selesai</button>
                    </li>
                </ul>
            </div>
    <div class="card-body">
        <div class="tab-content mt-2">
            <div class="tab-pane fade show active" id="navs-pills-top-telat" role="tabpanel">
                <div class="table-responsive text-nowrap">
                    <table id="myTable" class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Lengkap</th>
                                <th>Telat</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($userlate as $no => $item)
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->lateDay }} hari</td>
                                    <td>{{ $item->description }}</td>
                                    <td class="d-flex gap-1"><a href="/income/{{ $item->id }}/pay"
                                            class="btn btn-danger"><i class='bx bx-money'></i> Bayar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="navs-pills-top-selesai" role="tabpanel">
                <div class="table-responsive text-nowrap">
                    <table id="myTable" class="table">
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
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td class="d-flex gap-1"><a href="/income/{{ $item->id }}/edit"
                                            class="btn btn-warning"><i class="bx bx-edit-alt bx-xs"></i> Edit</a>
                                        <form action="/income/{{ $item->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"><i
                                                    class="bx bx-trash-alt bx-xs"></i> Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
    <script type="text/javascript">
        setTimeout(function() {

            // Closing the alert
            $('.alert').alert('close');
        }, 5000);
    </script>
</x-translayout>

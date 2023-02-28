<x-translayout>
<div class="card-body">

@if ($message = Session::get('success'))
    <div class="alert alert-primary alert-block">
        <strong>{{ $message }}</strong>
    </div>
@elseif ($errors->all())
    <div class="alert alert-danger fw-bold" role="alert">Data is invalid 😣</div>
@endif
<div class="col-xxl">
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Form Denda Keterlambantan</h5>
        </div>
        <div class="card-body">
            <form action="/late/{id}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Denda
                        Perhari</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                    class="bx bx-food-menu"></i></span>
                            <input type="number" name="body" class="form-control"
                                id="basic-icon-default-fullname" value="{{ $lates->body }}"
                                placeholder="Denda Belum diatur">
                        </div>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-warning">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<h5 class="card-header text-center">Data denda</h5>
<div class="nav-align-top mb-4 ">

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

    <div class="tab-content mt-2">
        <div class="tab-pane fade show active" id="navs-pills-top-telat" role="tabpanel">
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
                        @foreach ($telat as $no => $item)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->lateDay }}</td>
                                <td>{{ $item->description }}</td>
                                <td class="d-flex gap-1"><a href="/income/{{ $item->id }}/pay" class="btn btn-danger">Bayar</a>
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
                                <td>{{ $item->date }}</td>
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
<script type="text/javascript">
setTimeout(function() {

    // Closing the alert
    $('.alert').alert('close');
}, 3000);
</script>
</x-translayout>

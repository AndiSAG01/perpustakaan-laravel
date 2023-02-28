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
                    <h5 class="mb-0">Pembayaran Denda</h5> <small class="text-muted float-end">Merged input
                        group</small>
                </div>
                <div class="card-body">
                    <form action="/income" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama
                                Lengkap</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <select class="form-select" name="transaction_id" required>
                                        <option value="{{ $pay->id }}" selected>{{ $pay->user->name }}</option>
                                    </select>
                                </div>
                                @error('transaction_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-date">Tanggal
                                Pembayaran</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">

                                    <input type="date" class="form-control" id="basic-icon-default-date"
                                        name="date"
                                        value="{{ carbon\carbon::now()->format('Y-m-d') ?? old('date') }}">
                                </div>
                                @error('date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-date">Keterangan</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-date2" class="input-group-text"><i
                                            class="bx bx-hash"></i></span>
                                    <textarea class="form-control" name="description" id="description" rows="4">{{ old('description') }}</textarea>
                                </div>
                                @error('description')
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
                                    class="btn btn-warning"><i class="bx bx-edit-alt bx-xs"></i>Edit</a>
                                <form action="/income/{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"><i class="bx bx-trash-alt bx-xs"></i>Hapus</button>
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

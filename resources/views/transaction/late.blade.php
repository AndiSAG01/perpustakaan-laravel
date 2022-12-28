<x-app>
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
                    <h5 class="mb-0">Form Denda Keterlambantan Pengembalian Buku</h5> <small class="text-muted float-end">Merged input
                        group</small>
                </div>
                <div class="card-body">
                    <form action="/late/{id}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Denda Perhari</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-food-menu"></i></span>
                                    <input type="text" name="body" class="form-control"
                                        id="basic-icon-default-fullname" placeholder="">
                                </div>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- form --}}
        @include('transaction.store')
        {{-- endform --}}
        <h5 class="card-header">Table Peminjaman Buku</h5>
        <div class="table-responsive text-nowrap">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>no. transaksi</th>
                        <th>nama Peminjam</th>
                        <th>Buku dipinjam</th>
                        <th>Tanggal pinjam</th>
                        <th>tanggal kembali</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($transactions as $no => $item)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $item->transactionCode }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->book->title }}</td>
                            <td>{{ $item->entry }}</td>
                            <td>{{ $item->return }}</td>
                            <td class="d-flex justify-content-center gap-1">
                                <a href="/transaction/{{ $item->id }}/show" class="btn btn-info">Show</a>
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
    
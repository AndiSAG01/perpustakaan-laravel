<div class="mt-3">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#storetransaction">
        Tambah Peminjaman
    </button>

    <!-- Modal -->
    <div class="modal fade" id="storetransaction" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Tambah Peminjaman </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/transaction" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleDataList" class="form-label">nama Peminjam</label>
                            <input class="form-control" list="datalistOptions" name="user_id" id="user_id" placeholder="Type to search...">
                            <datalist id="datalistOptions">
                                @foreach ($users as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                             </datalist>
                             @error('user_id')
                             <span class="text-danger">{{ $message }}</span>
                         @enderror
                          </div>

                        <div class="mb-3">
                            <label for="exampleDataList" class="form-label">Buku yang dipinjam</label>
                            <input class="form-control" list="datalistOptionsbooks" name="book_id" id="book_id" placeholder="Type to search...">
                            <datalist id="datalistOptionsbooks">
                                @foreach ($books as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                             </datalist>
                             @error('book_id')
                             <span class="text-danger">{{ $message }}</span>
                         @enderror
                          </div>
                        <div class="col mb-3">
                            <label for="entry" class="form-label">tanggal pinjam</label>
                            <input type="date" class="form-control" name="entry" id="entry"
                                value="{{ $day }}">
                            @error('entry')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="return" class="form-label">tanggal kembali</label>
                            <input type="date" class="form-control" name="return" id="return">
                            @error('return')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="late_id" class="form-label">denda/perhari</label>
                            <input type="text" class="form-control" name="late_id" id="late_id"
                                value="{{ $late->body ?? '' }}" placeholder="Denda Belum diatur" required readonly>
                            @error('late_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

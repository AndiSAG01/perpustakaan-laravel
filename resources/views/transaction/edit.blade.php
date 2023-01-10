<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editedtransaction">
    Edit Transaksi
</button>

<!-- Modal -->
<div class="modal fade" id="editedtransaction" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/transaction/{id}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="col mb-3">
                        <label for="book_id" class="form-label">Judul Buku</label>
                        <select class="form-select form-select-lg" name="book_id" id="book_id">
                            <option value="{{ $transaction->book->id }}" selected>{{ $transaction->book->title }}</option>
                            @foreach ($books as $item)
                            <option value="{{ $item->id}}">{{ $item->title}}</option>
                            @endforeach
                        </select>
                        @error('book_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="user_id" class="form-label">Nama Peminjam</label>
                        <select class="form-select form-select-lg" name="user_id" id="user_id">
                            <option value="{{ $transaction->user->id }}" selected>{{ $transaction->user->name }}</option>
                            @foreach ($users as $item)
                            <option value="{{ $item->id}}">{{ $item->name}}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="entry" class="form-label">tanggal pinjam</label>
                        <input type="date" id="entry" class="form-control" value="{{ $transaction->entry }}"
                            name="entry">
                        @error('entry')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="return" class="form-label">tanggal kembali</label>
                        <input type="date" id="return" class="form-control" value="{{ $transaction->return }}"
                            name="return">
                        @error('return')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="status">Status Peminjaman</label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="status" id="1" value="1" @if ($transaction->status == true)
                              checked
                          @endif>
                          <label class="form-check-label" for="1">
                            Selesai
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="status" id="0" value="0" @if ($transaction->status == false)
                              checked
                          @endif>
                          <label class="form-check-label" for="0">
                            Dipinjam
                          </label>
                        </div>
                        @error('return')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="description" class="form-label">keterangan</label>
                        <input type="text" id="description" class="form-control" value="{{ $transaction->description }}"
                            name="description">
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

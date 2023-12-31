<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editedtransaction">
    <i class='bx bxs-edit'></i> Ubah
</button>

<!-- Modal -->
<div class="modal fade" id="editedtransaction" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title p-3 rounded alert-warning">
                    <strong>Peringatan!!!</strong>  Pastikan data yang diinputkan lengkap dan tidak ada informasi yang terlewatkan. Hal ini termasuk informasi seperti nama peminjam, judul buku dan lain sebagainya.
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/transaction/{{ $transaction->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" id="late_id" name="late_id" value="{{ $transaction->late_id }}">
                    <div class="col mb-3">
                        <label for="book_id" class="form-label">Judul Buku</label>
                        <select class="form-select form-select-lg" name="book_id" id="book_id">
                            @foreach ($books as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $transaction->book->id ? 'selected' : '' }}>{{ $item->title }}</option>
                            @endforeach
                        </select>
                        @error('book_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="user_id" class="form-label">Nama Peminjam</label>
                        <select class="form-select form-select-lg" name="user_id" id="user_id">
                            <option value="{{ $transaction->user->id }}" selected>{{ $transaction->user->name }}
                            </option>
                            @foreach ($users as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $transaction->user->id ? 'selected' : '' }}>{{ $item->name }}</option>
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
                            <input class="form-check-input" type="radio" name="status" id="1" value="1"
                                @if ($transaction->status == true) checked @endif>
                            <label class="form-check-label" for="1">
                                Selesai
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="0" value="0"
                                @if ($transaction->status == false) checked @endif>
                            <label class="form-check-label" for="0">
                                Dipinjam
                            </label>
                        </div>
                        @error('return')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="lateDay" class="form-label">Telat</label>
                        <input type="number" id="lateDay" class="form-control" value="{{ $transaction->lateDay }}" name="lateDay">
                        @error('lateDay')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="description" class="form-label">keterangan</label>
                        <input type="text" id="description" class="form-control" value="{{ $transaction->description}}" name="description">
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class='bx bx-arrow-back'></i> Kembali</button>
                    <button type="submit" class="btn btn-primary"><i class='bx bx-save'></i> Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>

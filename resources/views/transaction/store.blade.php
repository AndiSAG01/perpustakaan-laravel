<div class="mt-3">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#storetransaction">
<i class='bx bx-folder-plus'></i> Tambah Peminjaman
</button>

<!-- Modal -->
<div class="modal fade" id="storetransaction" tabindex="-1" style="display: none;" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
        <p class="modal-title p-3 rounded alert-warning">
            <strong>Peringatan!!!</strong>  Pastikan data yang diinputkan lengkap dan tidak ada informasi yang terlewatkan. Hal ini termasuk informasi seperti nama peminjam, judul buku dan lain sebagainya.
        </p>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
<form action="/transaction" method="POST">
    @csrf
    <div class="modal-body">
        <div class="mb-3">
                <label for="user_id" class="form-label">Nama peminjam</label>
                <select class="form-select form-select" name="user_id" id="user_id">
                    <option selected disabled value=" ">Pilih salah satu</option>
                    @foreach ($users as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
                </select>
                @error('user_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>

        <div class="mb-3">
            <label for="book_id" class="form-label">Buku yang dipinjam</label>
                <select class="form-select form-select" name="book_id" id="book_id">
                    <option selected disabled value=" ">Pilih salah satu</option>
                    @foreach ($books as $item)
                    <option value="{{ $item->id }}" @if($item->stock == 0) disabled class="text-danger" @endif>{{ $item->title }} {{ 'Stok : '. $item->stock }}</option>
                    @endforeach
                </select>
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
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="bx bx-arrow-back bx-xs"></i> Tutup</button>
        <button type="submit" class="btn btn-primary"><i class='bx bx-save' ></i> Simpan</button>
    </div>
</form>
</div>
</div>
</div>
</div>

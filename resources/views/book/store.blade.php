<div class="mt-3">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#storebook">
<i class='bx bx-folder-plus'></i> Tambah Buku
</button>

<!-- Modal -->
<div class="modal fade" id="storebook" tabindex="-1" style="display: none;" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
        <p class="modal-title p-3 rounded alert-warning">
            <strong>Peringatan!!!</strong>  Pastikan data yang diinputkan lengkap dan tidak ada informasi yang terlewatkan. Hal ini termasuk informasi seperti judul buku, ISBN dan lain sebagainya.
        </p>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="/book" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="col mb-3">
                <label for="title" class="form-label">Judul Buku</label>
                <input type="text" id="title" class="form-control" value="{{ old('title') }}"
                    name="title" placeholder="Enter Title">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col mb-3">
                <label for="image" class="form-label">Cover</label>
                <input type="file" id="image" class="form-control" value="{{ old('image') }}"
                    name="image">
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col mb-3">
                <label for="isbn" class="form-label">ISBN Buku</label>
                <input type="number" id="isbn" class="form-control" value="{{ old('isbn') }}"
                    name="isbn" placeholder="xxxxxxxxx">
                @error('isbn')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Kategori Buku</label>
                <select id="select" class="form-select form-select" name="category_id">
                    <option value=" " selected disabled>Pilih satu</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col mb-3">
                <label for="author" class="form-label">Penulis</label>
                <input type="text" id="author" class="form-control" value="{{ old('author') }}"
                    name="author" placeholder="Tata Sutabri">
                @error('author')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col mb-3">
                <label for="author" class="form-label">Asal buku</label>
                <div class="input-group">
                    <select class="form-select rounded-left" name="source_id" required>
                        <option value="  " selected disabled>Pilih salah satu</option>
                        @foreach ($source as $item)
                        <option value="{{ $item->id}}">{{ $item->body }}</option>
                    @endforeach
                    </select>
                    <input type="text" class="form-control" name="by" placeholder="Oleh..." required>
                    </div>
            </div>
            
            <div class="col mb-3">
                <label for="publisher" class="form-label">Penerbit</label>
                <input type="text" id="publisher" class="form-control" value="{{ old('publisher') }}"
                    name="publisher" placeholder="Gramedia">
                @error('publisher')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col mb-3">
                <label for="publicationYear" class="form-label">Tahun Terbit</label>
                <input type="text" id="publicationYear" class="form-control"
                    value="{{ old('publicationYear') }}" name="publicationYear" placeholder="20XX">
                @error('publicationYear')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col mb-3">
                <label for="stock" class="form-label">stok buku</label>
                <input type="number" id="stock" class="form-control" value="{{ old('stock') }}"
                    name="stock" placeholder="1X">
                @error('stock')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary"
                data-bs-dismiss="modal"><i class="bx bx-arrow-back bx-xs"></i> Tutup</button>
            <button type="submit" class="btn btn-primary"><i class='bx bx-save' ></i> Simpan</button>
        </div>
    </form>
</div>
</div>
</div>
</div>


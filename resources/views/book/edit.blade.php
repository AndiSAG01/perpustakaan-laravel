<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editedbook">
    Edit
</button>

<!-- Modal -->
<div class="modal fade" id="editedbook" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/book/{id}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="col mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" id="title" class="form-control" value="{{ $book->title }}"
                            name="title" placeholder="Enter Title">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- <div class="col mb-3 d-none">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" id="image" class="form-control" value="{{ $book->image }}"
                            name="image">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div> --}}

                    <div class="col mb-3">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input type="number" id="isbn" class="form-control" value="{{ $book->isbn }}"
                            name="isbn" placeholder="xxxxxxxxx">
                        @error('isbn')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori Buku</label> <br>
                        <select class="form-select form-select" name="category_id">
                            <option selected value="{{ $book->category->id }}" >{{ $book->category->name }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $book->id ? 'selected' : '' }}>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col mb-3">
                        <label for="author" class="form-label">Penulis</label>
                        <input type="text" id="author" class="form-control" value="{{ $book->author }}"
                            name="author" placeholder="Tata Sutabri">
                        @error('author')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="publisher" class="form-label">publisher</label>
                        <input type="text" id="publisher" class="form-control" value="{{ $book->publisher }}"
                            name="publisher" placeholder="Gramedia">
                        @error('publisher')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="publicationYear" class="form-label">publicationYear</label>
                        <input type="number" id="publicationYear" value="{{ $book->publicationYear }}"
                            class="form-control" name="publicationYear" placeholder="20XX">
                        @error('publicationYear')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="stock" class="form-label">stock</label>
                        <input type="number" id="stock" class="form-control" value="{{ $book->stock }}"
                            name="stock" placeholder="1X">
                        @error('stock')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
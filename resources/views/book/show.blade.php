<x-app>
<div class="col-xxl">
    <div class="card">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
        </div>
    @elseif ($errors->all())
        <div class="alert alert-danger fw-bold" role="alert">Data is invalid 😣</div>
    @endif
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Form Buku</h5> <small class="text-muted float-end">Merged input
                group</small>
        </div>
        <div class="card-body">
            <form action="/book/{{ $book->id }}" method="POST">
                {{-- @csrf
                @method('PUT') --}}
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">ISBN</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <input type="text" name="isbn" class="form-control"
                                id="basic-icon-default-fullname" value="{{ $book->isbn }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Judul Buku</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <input type="text" name="title" class="form-control"
                                id="basic-icon-default-fullname" value="{{ $book->title }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Kategori Buku</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge" >
                            <select disabled id="defaultSelect" class="form-select">
                                <option value="">{{ $book->category->name }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Penulis</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <input type="text" name="author" class="form-control"
                                id="basic-icon-default-fullname" value="{{ $book->author }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Penerbit</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <input type="text" name="publisher" class="form-control"
                                id="basic-icon-default-fullname" value="{{ $book->publisher }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Tahun Terbit</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <input type="text" name="publicationYear" class="form-control"
                                id="basic-icon-default-fullname" value="{{ $book->publicationYear }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">stok</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <input type="text" name="stock" class="form-control"
                                id="basic-icon-default-fullname" value="{{ $book->stock }}" readonly>
                        </div>
                    </div>
                </div>
            
                <div class="card-footer d-flex gap-3">
                    <a href="/book" class="btn btn-secondary">Back</a>
                    @include('book.edit')
                    <form action="/book/{{ $book->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>
            </form>
        </div>
    </div>
</div>

</x-app>

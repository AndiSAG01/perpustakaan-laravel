<x-app>
    <div class="col-xxl">
        <div class="card">
            <div class="card-header align-items-center justify-content-between">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <strong>{{ $message }}</strong>
                </div>
            @elseif ($errors->all())
                <div class="alert alert-danger fw-bold" role="alert">Data is invalid 😣</div>
            @endif
                <h3 class="mb-0 text-center">Detail Buku</h3>
            </div>
            {{-- <form action="/book/{{$book->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') --}}
                <div class="card-body">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-4">
                            <img src="{{ $book->image ?? url('https://api.dicebear.com/5.x/adventurer/svg?seed=Felix') }}"
                                class="d-block rounded" height="100" width="100" id="uploadedAvatar">
                            <div class="button-wrapper">
                                <a href="{{ $book->image }}" class="btn btn-outline-primary btn-sm">Lihat</a>
                            </div>
                        </div>
                    </div>
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
                            <div class="input-group input-group-merge">
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
                        <a href="/book" class="btn btn-secondary"><i class="bx bx-arrow-back bx-xs"></i> Back</a>
                        @include('book.edit')
                        <form action="/book/{{ $book->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"><i class="bx bx-trash-alt bx-xs"></i> Delete</button>
                        </form>
                    </div>
            {{-- </form> --}}
        </div>
    </div>
    </div>
    <script type="text/javascript">
        setTimeout(function() {

            // Closing the alert
            $('.alert').alert('close');
        }, 3000);
    </script>
</x-app>

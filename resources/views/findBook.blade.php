<x-guest>
  <div class="container">

  <div class="row align-items-center">
    <div class="col-md-6 text-md-start text-center py-6">
        <h1 class="mb-4 fs-9 fw-bold">Pencarian data buku</h1>
    </div>
</div>
<form action="/findBook" method="POST" class="mb-5">
  @csrf
    <div class="mb-3 row">
        <label for="find" class="col-sm-4 col-form-label">Judul Buku</label>
        <div class="col-sm-8">
            <input type="text" name="find" value="{{ old('find') }}" list="datalistOptions"
                placeholder="Enter Your find" class="form-control" id="find">
            @error('find')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="mb-3 col text-end">
        <button type="submit" class="btn btn-outline-dark">Submit</button>
    </div>
</form>
  </div>

</x-guest>
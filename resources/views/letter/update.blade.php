<x-app>
    <div class="card-body">
      <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Form Kategori Buku</h5> <small class="text-muted float-end">Merged input group</small>
          </div>
          <div class="card-body">
            <form action="/category/{{ $category->id }}" method="POST">
              @csrf
              @method('PUT')
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Code Kategory</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-food-menu"></i></span>
                    <input type="text" name="code" class="form-control" id="basic-icon-default-fullname" value="{{ $category->code }}">
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-icon-default-code">Nama Kategory</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-code2" class="input-group-text"><i class="bx bx-hash"></i></span>
                    <input type="text" name="name" class="form-control" id="basic-icon-default-code" value="{{ $category->name }}">
                  </div>
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
        <h5 class="card-header">Table Basic</h5>
        <div class="table-responsive text-nowrap">
          <table class="table text-center">
              <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Nama Penanggung Jawab</th>
                    <th>Posisi Penanggung Jawab</th>
                    <th>No. Identitas Penanggung Jawab</th>
                    <th>Action</th>
                  </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                  @foreach ($categories as $no => $item)
                      <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $item->code }}</td>
                          <td>{{ $item->name }}</td>
                          <td class="d-flex justify-content-center gap-1"><a href="/category/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                          <form action="/category/{{ $item->id}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Delete</button>
                          </form>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
      </div>
</x-app>
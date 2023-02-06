<x-guest>
    <div class="container my-3">
        <div class="row align-items-center">
            <div class="col-md-6 text-md-start text-center py-6">
                <h1 class="mb-4 fs-9 fw-bold">Presensi Pengunjung</h1>
            </div>
        </div>
        {{ $get ?? ''}}
        <form action="/presensi" method="post" class="mb-5">
            @csrf
            <div class="mb-3 row">
                <label for="nama" class="col-sm-4 col-form-label">Nama Lengkap</label>
                <div class="col-sm-8">
                    <input type="text" name="name" value="{{ old('name') }}" list="datalistOptions"
                        placeholder="Enter Your Name" class="form-control" id="nama">
                    <datalist id="datalistOptions">
                        @foreach ($user as $item)
                            <option value="{{ $item->name }}">
                        @endforeach
                    </datalist>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="from" class="col-sm-4 col-form-label">Asal Pengunjung</label>
                <div class="col-sm-8">
                    <input type="text" name="from" value="{{ old('from') }}" placeholder="Enter Your Origin"
                        class="form-control" id="from">
                    @error('from')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="description" class="col-sm-4 col-form-label">Tujuan pengunjung</label>
                <div class="col-sm-8">
                    <input type="text" name="description" value="{{ old('description') }}"
                        placeholder="Enter Your Destination" class="form-control" id="description">
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="mb-3 col text-end">
                <button type="submit" class="btn btn-outline-dark">Submit</button>
            </div>
        </form>
        <div class="card-title text-center pt-5">
            <h3>Table presensi pengunjung perpustakaan</h3>
        </div>
        <div class="table-responsive text-nowrap pt-5 ">
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Lengkap</th>
                        <th>Asal Pengunjung</th>
                        <th>Tujuan Pengunjung</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($guest as $no => $item)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->from }}</td>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        setTimeout(function() {

            // Closing the alert
            $('.alert').alert('close');
        }, 6000);
    </script>
</x-guest>

<x-app>
    <div class="card bg-white p-3 mb-3 rounded-3 justify-content-center">
        <h5 class="fw-bold text-center">KATEGORI BUKU</h5>
        <div class="d-flex overflow-hidden ">
            {!! $chart->container() !!}
        </div>
        <div class="col">
            <a class="btn btn-primary mt-3" href="/category">Selengkapnya...</a>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-primary alert-block">
            <strong>{{ $message }}</strong>
        </div>
    @elseif ($errors->all())
        <div class="alert alert-danger fw-bold" role="alert">Data is invalid 😣</div>
    @endif
    <div class="card p-3 mb-3 fw-bold">
        <h3 class="fw-bold">BUKU</h3>
        Anda sedang mengakses halaman buku. Mohon pastikan bahwa tindakan yang Anda lakukan sesuai dengan
        aturan dan kebijakan perpustakaan.
    </div>
    @include('book.store')

    <div class="card my-3">
        <div class="card-header">
            <h5 class="text-center">Data Buku</h5>
        </div>
        <div class="card-body table-responsive text-nowrap">
            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>No Katalog</th>
                        <th>Judul Buku</th>
                        <th>Kategori Buku</th>
                        <th>Stok</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($books as $no => $item)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $item->barcode }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->category->name ?? '' }}</td>
                            <td>{{ $item->stock }} exampler</td>
                            <td class="d-flex gap-1">
                                <a href="/book/{{ $item->id }}/show" class="btn btn-info btn-sm"><i
                                        class='bx bx-show-alt'></i> Lihat</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}

    <script type="text/javascript">
        setTimeout(function() {

            // Closing the alert
            $('.alert').alert('close');
        }, 3000);
    </script>
</x-app>

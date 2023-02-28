<x-app>
    <style>
        #morph {
            /* From https://css.glass */
            background: rgba(89, 99, 123, 0.24);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(8.7px);
            -webkit-backdrop-filter: blur(8.7px);
            border: 1px solid rgba(89, 99, 123, 0.88);
            padding-top: 20px;
            padding-bottom: 20px;
        }
    </style>
    <div class="card-header">
        <div class="container" id="morph">
            <h5 class="fw-bold text-center">Kategori Buku</h5>
            <div class="col d-flex">
                {!! $chart->container() !!}
            </div>
            <a class="btn btn-primary mt-3" href="/category">Selengkapnya...</a>
        </div>
    </div>
    <div class="card-body">
        @if ($message = Session::get('success'))
            <div class="alert alert-primary alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @elseif ($errors->all())
            <div class="alert alert-danger fw-bold" role="alert">Data is invalid 😣</div>
        @endif
        <div class="card-header">
            <h5 class="fw-bold text-center">Data Buku</h5>
            @include('book.store')
        </div>
        <div class="table-responsive text-nowrap">
            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th>No.</th>
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
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->category->name ?? '' }}</td>
                            <td>{{ $item->stock }} exampler</td>
                            <td class="d-flex gap-1">
                                <a href="/book/{{ $item->id }}/show" class="btn btn-info btn-sm"><i
                                        class="bx bx-radio-circle bx-burst-hover bx-xs"></i> Lihat</a>
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

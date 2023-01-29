<x-app>
    <div class="card-body">
        <h5 class="text-center fw-bold">Kategori Buku</h6>
        <div class="row gap-3">
            @foreach ($total as $item)
                <div class="col">
                    <div class="shadow p-2 bg-body-tertiary rounded">
                        <div class="d-flex align-items-start">
                            <div class="shadow-sm me-2 text-primary">
                                <i class='bx bxs-bookmark-minus'></i>
                            </div>
                            <div class="d-flex flex-wrap gap-2 overflow-hidden" style="max-width: 80px">
                                <div class="d-flex flex-column ">
                                    <span class="fw-bold">{{ $item->category->code }}</span>
                                    <small class="mb-0">{{ $item->jumlah }} Buku</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="btn btn-primary mt-3" href="/category">Selengkapnya...</a>
    </div>
    <div class="card-body">
        @if ($message = Session::get('success'))
            <div class="alert alert-primary alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @elseif ($errors->all())
            <div class="alert alert-danger fw-bold" role="alert">Data is invalid 😣</div>
        @endif
        {{-- form --}}
        @include('book.store')
        {{-- endform --}}
        <h5 class="card-header fw-bold text-center">Data Buku</h5>
        <div class="table-responsive text-nowrap">
            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kategori Buku</th>
                        <th>Judul Buku</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($books as $no => $item)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $item->category->name ?? '' }}</td>
                            <td>{{ $item->title }}</td>
                            <td class="d-flex gap-1">
                                <a href="/book/{{ $item->id }}/show" class="btn btn-info btn-sm"><i class="bx bx-radio-circle bx-burst-hover bx-xs"></i> Lihat</a>
                            </td>
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
        }, 3000);
    </script>
</x-app>

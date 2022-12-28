<x-app>
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
        <h5 class="card-header">Table Buku</h5>
        <div class="table-responsive text-nowrap">
            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Barcode Buku</th>
                        <th>Kategori Buku</th>
                        <th>Judul Buku</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($books as $no => $item)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>                   
                            </td>
                            <td>{{ $item->category->name ?? ''}}</td>
                            <td>{{ $item->title }}</td>
                            <td class="d-flex gap-1">
                                <a href="/book/{{ $item->id }}/show" class="btn btn-info">Show</a>
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

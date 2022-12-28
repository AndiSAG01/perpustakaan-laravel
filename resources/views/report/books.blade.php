<x-report>
    <div class="card-body d-print">
        <h3 class="card-header text-center">Table Buku</h3>
        <div class="table-responsive text-nowrap">
            <button class="btn btn-outline-primary d-print-none" onClick="window.print()"><i class='bx bxs-printer' ></i>
            </button>
            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Barcode Buku</th>
                        <th>Judul Buku</th>
                        <th>Kategori Buku</th>
                        <th>author</th>
                        <th>publisher</th>
                        <th>publicationYear</th>
                        <th>stok</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($books as $no => $item)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{!! DNS2D::getBarcodeSVG("{{ $item->barcode }}", 'QRCODE',1.5,1.5) !!}                    
                            </td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->category->name ?? ''}}</td>
                            <td>{{ $item->author}}</td>
                            <td>{{ $item->publisher}}</td>
                            <td>{{ $item->publicationYear}}</td>
                            <td>{{ $item->stock}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-report>
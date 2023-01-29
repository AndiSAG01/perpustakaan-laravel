<x-guest>
    <div class="container p-5">
        <div class="row align-items-center">
            <div class="col-md-6 text-md-start text-center py-6">
                <h1 class="mb-4 fs-9 fw-bold">Pencarian data buku</h1>
            </div>
        @if ($book->isEmpty())
            <h1 class="text-center">Buku tidak ditemukan </h1>
        @else
            @foreach ($book as $item)
            <div class="container">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ $item->image }}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h3 class="card-title fw-bold">{{ $item->title }}</h3>
                                <small class="card-text fw-bold">{{ $item->category->name }}</small>
                                <p class="card-text">Ditulis oleh {{ $item->author }} dan diterbitkan pada {{ $item->publicationYear }}, {{ $item->publisher }} dengan Kode ISBN {{ $item->isbn }}</p>
                                <p class="card-text"><small class="text-muted">Stok ketersedian : {{ $item->stock }}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
            @endforeach
            </div>
        @endif

    </div>
</x-guest>

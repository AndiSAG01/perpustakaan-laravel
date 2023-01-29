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
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ $item->image }}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural
                                    lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="card border border-3 border-dark w-25" style="width: 18rem;">
                <img src="{{ $item->image }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Judul :{{ $item->title }}</h5>
                    <p class="card-text">ISBN : {{ $item->isbn }}</p>
                    <p class="card-text">{{ $item->author }}</p>
                    <p class="card-text">{{ $item->stock }}</p>
                </div>
            </div>
        @endif

    </div>
</x-guest>

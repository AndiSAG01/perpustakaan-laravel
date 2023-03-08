<x-app>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="user-profile-header-banner overflow-hidden">
                    <img src="https://source.unsplash.com/random/1000x200?sig=1" alt="Banner image" class="rounded-top">
                </div>
                <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4 ">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img src="{{ $book->image }}" height="130" width="130" alt="user image"
                            class="d-block ms-0 ms-sm-4 rounded user-profile-img">
                    </div>
                    <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div
                            class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                                <h4>{{ $book->title }}</h4>
                                <ul
                                    class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                    <li class="list-inline-item fw-semibold">
                                        <i class='bx bx-food-menu'></i>{{ $book->category->name }}
                                    </li>
                                    <li class="list-inline-item fw-semibold">
                                        <i class='bx bx-bookmark'></i> {{ $book->isbn }}
                                    </li>
                                    <li class="list-inline-item fw-semibold">
                                        <i class='bx bx-bookmark'></i>
                                        {{ \App\Models\Transaction::where([['book_id', $book->id], ['status', 1]])->count() }}
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--  --}}
    <div class="row">
        <div class="col-xl-6 col-lg-5 col-md-5">
            <!-- About User -->
            <div class="card mb-4">
                <div class="card-body">
                    <small class="text-muted text-uppercase">About</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span
                                class="fw-semibold mx-2">Judul Buku:</span> <span>{{ $book->title }}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-detail"></i><span
                                class="fw-semibold mx-2">ISBN:</span> <span>{{ $book->isbn }}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span
                                class="fw-semibold mx-2">Penulis:</span> <span>{{ $book->author }}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-flag"></i><span
                                class="fw-semibold mx-2">Penerbit:</span> <span>{{ $book->publisher }}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-detail"></i><span
                                class="fw-semibold mx-2">Tahun terbit:</span> <span>{{ $book->publicationYear }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-detail"></i><span
                                class="fw-semibold mx-2">Asal:</span> <span>{{ $book->publicationYear }}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-detail"></i><span
                                class="fw-semibold mx-2">Stok:</span> <span>{{ $book->stock }}</span></li>
                    </ul>
                    <small class="text-muted text-uppercase">Overview</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-chat"></i><span
                                class="fw-semibold mx-2">Permintaan:</span>
                            <span>{{ \App\Models\Transaction::where([['book_id', $book->id], ['status', 2]])->count() }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-chat"></i><span
                                class="fw-semibold mx-2">Pinjam:</span>
                            <span>{{ \App\Models\Transaction::where([['book_id', $book->id], ['status', 0]])->count() }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-chat"></i><span
                                class="fw-semibold mx-2">Kembalikan:</span>
                            <span>{{ \App\Models\Transaction::where([['book_id', $book->id], ['status', 1]])->count() }}</span>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-7 col-md-7">
            <div class="card mb-4 overflow-auto" style="height: 470px">
                <div class="col-lg-6 p-4">
                    <small class="text-light fw-semibold">TIMELINE</small>
                    @php
                        $transactionBook = \App\Models\Transaction::where('book_id', $book->id)
                            ->orderby('created_at', 'asc')
                            ->get();
                    @endphp
                    <ul class="d-inline">
                        <ul>
                            @foreach ($transactionBook as $item)
                                <li class="timeline-item timeline-item-transparent mb-4">
                                    <div class="timeline-event">
                                        <div class="timeline-header mb-1">
                                            <h6 class="mb-0">{{ $item->user->name }}</h6>
                                        </div>
                                        @if ($item->status == 0)
                                            <strong class="mb-2 text-primary">Dipinjam <small
                                                    class="text-muted">{{ $item->created_at }}</small></strong>
                                        @elseif ($item->status == 1)
                                            <strong class="mb-2 text-success">Dikembalikan <small
                                                    class="text-muted">{{ $item->created_at }}</small></strong>
                                        @elseif ($item->status == 2)
                                            <strong class="mb-2 text-warning">Permintaan pinjam <small
                                                    class="text-muted">{{ $item->created_at }}</small></strong>
                                        @elseif ($item->status == 3)
                                            <strong class="mb-2 text-danger">Permintaan ditolak <small
                                                    class="text-muted">{{ $item->created_at }}</small></strong>
                                        @endif
                                        <div class="d-flex flex-wrap">
                                            <div>
                                                <h6 class="mb-0">{{ $item->description }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </ul>
                </div>
            </div>
            <div class="d-flex gap-4 justify-content-start">
                <a class="btn btn-secondary" href="/book" role="button"><i class="bx bx-arrow-back bx-xs"></i>
                    Kembali</a>
                @include('book.edit')
                <form action="/book/{{ $book->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit"><i class="bx bx-trash-alt bx-xs"></i>
                        Hapus</button>
                </form>
            </div>
        </div>
    </div>
</x-app>

<x-app>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="user-profile-header-banner overflow-hidden">
                    <img src="https://source.unsplash.com/random/1000x200?sig=1" alt="Banner image" class="rounded-top">
                </div>
                <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4 ">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img src="{{ $transaction->user->photo }}" height="130" width="130" alt="user image"
                            class="d-block ms-0 ms-sm-4 rounded user-profile-img">
                    </div>
                    <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div
                            class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                                <h4>{{ $transaction->user->name }}</h4>
                                <ul
                                    class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                    <li class="list-inline-item fw-semibold">
                                        <i class='bx bx-credit-card-front'></i>{{ $transaction->user->noId }}
                                    </li>
                                    <li class="list-inline-item fw-semibold">
                                        <i class='bx bx-user'></i>
                                        @if ($transaction->user->status == 0)
                                            Siswa/i
                                        @elseif ($transaction->user->status == 1)
                                            Guru
                                        @else
                                            Administrator
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->all())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Judul Buku</label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="title" class="form-control" id="basic-icon-default-fullname"
                            value="{{ $transaction->book->title }}" readonly>
                    </div>
                </div>
                <div class="col mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">nama Peminjam</label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="user_id" class="form-control" id="basic-icon-default-fullname"
                            value="{{ $transaction->user->name }}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Denda/<small>Perhari</small></label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="late_id" class="form-control" id="basic-icon-default-fullname"
                            placeholder="{{ $transaction->late->body }}" readonly>
                    </div>
                </div>
                <div class="col mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Tanggal permintaan</label>
                    <div class="input-group input-group-merge">
                        <input type="date" name="submission" class="form-control" id="basic-icon-default-fullname"
                            value="{{ $transaction->submission }}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Tanggal peminjaman <small
                            class="text-primary">Tanggal Hari ini</small></label>
                    <div class="input-group input-group-merge">
                        <input type="date" name="entry" class="form-control" id="basic-icon-default-fullname"
                            value="{{ $transaction->entry }}" readonly>
                    </div>
                    @error('entry')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Tanggal Kembali</label>
                    <div class="input-group input-group-merge">
                        <input type="date" name="return" class="form-control" value="{{ $transaction->return }}"
                            id="basic-icon-default-fullname" readonly>
                    </div>
                    @error('return')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Telat </label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="lateDay" class="form-control" id="basic-icon-default-fullname"
                            value="{{ $transaction->lateDay }}" readonly>
                    </div>
                    @error('lateDay')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <input type="hidden" name="late_id" class="d-none" value="{{ $transaction->late_id }}" readonly>
                <div class="col mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Keterangan</label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="description" class="form-control"
                            value="{{ $transaction->description }}" id="basic-icon-default-fullname" readonly>
                    </div>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Status</label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="status" class="form-control"
                            @if ($transaction->status == 0) value="Dipinjam"
                    @elseif ($transaction->status == 1)
                    value="Selesai"
                    @elseif ($transaction->status == 2)
                    value="Tertunda"
                    @else
                    value="Ditolak" @endif
                            id="basic-icon-default-fullname" readonly>
                    </div>
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col mb-3 gap-3">
                    <a href="/transaction" class="btn btn-secondary"><i class='bx bx-arrow-back'></i> Kembali</a>
                    @include('transaction.edit')
                    <form class="d-inline" action="/transaction/{{ $transaction->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class='bx bx-trash'></i> Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6 col-lg-5 col-md-5">
            <!-- About Book -->
            <div class="card mb-4">
                <div class="card-body">
                    <small class="text-muted text-uppercase">About User</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><small
                                class="fw-semibold mx-2">Nama Lengkap:</small>
                            <small>{{ $transaction->user->name }}</small>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-detail"></i><small
                                class="fw-semibold mx-2">No Identitas:</small>
                            <small>{{ $transaction->user->noId }}</small>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><small
                                class="fw-semibold mx-2">Status:</small> <small>Aktif</small></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><small
                                class="fw-semibold mx-2">Peran:</small> <small>
                                @if ($transaction->user->status == 0)
                                    Siswa/i
                                @elseif ($transaction->user->status == 1)
                                    Guru
                                @elseif ($transaction->user->status == 2)
                                    Administrator
                                @endif
                            </small>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-flag"></i><small
                                class="fw-semibold mx-2">Jenis Kelamin:</small> <small>
                                @if ($transaction->user->gender == '0')
                                    Laki-laki
                                @else
                                    Perempuan
                                @endif
                            </small></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-detail"></i><small
                                class="fw-semibold mx-2">Tanggal lahir:</small>
                            <small>{{ $transaction->user->birthday }}</small>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-phone"></i><small
                                class="fw-semibold mx-2">Telp:</small> <small> <a
                                    href="{{ url('https://api.whatsapp.com/send/?phone=' . $transaction->user->telp . '&text&type=phone_number&app_absent=0') }}">{{ $transaction->user->telp }}</a></small>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-chat"></i><small
                                class="fw-semibold mx-2">Email:</small> <small>{{ $transaction->user->email }}</small>
                        </li>
                    </ul>
                    <small class="text-muted text-uppercase">History</small>
                    @php
                        $pinjam = \App\Models\Transaction::where([['user_id', $transaction->user->id], ['status', 0]])->count();
                        
                        $permintaan = \App\Models\Transaction::where([['user_id', $transaction->user->id], ['status', 2]])->count();
                        
                        $selesai = \App\Models\Transaction::where([['user_id', $transaction->user->id], ['status', 1]])->count();
                    @endphp
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class='bx bx-archive-in'></i><small
                                class="fw-semibold mx-2">Permintaan:</small> <small>{{ $permintaan }}</small>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class='bx bx-time'></i><small
                                class="fw-semibold mx-2">Pinjam:</small> <small> {{ $pinjam }}</small>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class='bx bx-calendar-check'></i><small
                                class="fw-semibold mx-2">Selesai:</small> <small>{{ $selesai }}</small>
                        </li>
                    </ul>
                    <small class="text-muted text-uppercase">About Book</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex mb-3"><i class='bx bx-bookmark'></i><small class="fw-semibold mx-2">No
                                Katalog:</small> <small>{{ $transaction->book->barcode }}</small></li>
                        <li class="d-flex mb-3"><i class='bx bx-book-bookmark'></i><small
                                class="fw-semibold mx-2">Judul:</small> <small>{{ $transaction->book->title }}</small>
                        </li>
                        <li class="d-flex mb-3"><i class='bx bx-credit-card-front'></i><small
                                class="fw-semibold mx-2">ISBN:</small> <small>{{ $transaction->book->isbn }}</small>
                        </li>
                        <li class="d-flex mb-3"><i class='bx bx-food-menu'></i><small
                                class="fw-semibold mx-2">Kategori:</small>
                            <small>{{ $transaction->book->category->name }}</small>
                        </li>
                        <li class="d-flex mb-3"><i class='bx bxs-user-rectangle'></i><small
                                class="fw-semibold mx-2">Penulis:</small>
                            <small>{{ $transaction->book->author }}</small>
                        </li>
                        <li class="d-flex mb-3"><i class="bx bx-flag"></i><small
                                class="fw-semibold mx-2">Penerbit:</small>
                            <small>{{ $transaction->book->publisher }}</small>
                        </li>
                        <li class="d-flex mb-3"><i class='bx bx-calendar-event'></i><small
                                class="fw-semibold mx-2">Tahun terbit:</small>
                            <small>{{ $transaction->book->publicationYear }}</small>
                        </li>
                        <li class="d-flex mb-3"><i class="bx bx-detail"></i><small
                                class="fw-semibold mx-2">Asal:</small>
                            <small>{{ $transaction->book->source->body . ' oleh ' . $transaction->book->by }}</small>
                        </li>
                        <li class="d-flex mb-3"><i class='bx bx-list-ol'></i><small
                                class="fw-semibold mx-2">Stok:</small> <small>{{ $transaction->book->stock }}</small>
                        </li>
                    </ul>
                    <small class="text-muted text-uppercase">Overview</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex mb-3"><i class='bx bx-list-plus'></i><small
                                class="fw-semibold mx-2">Permintaan Buku:</small>
                            <small>{{ \App\Models\Transaction::where([['book_id', $transaction->book->id], ['status', 2]])->count() }}</small>
                        </li>
                        <li class="d-flex mb-3"><i class='bx bx-list-minus'></i><small class="fw-semibold mx-2">Buku
                                dipinjam:</small>
                            <small>{{ \App\Models\Transaction::where([['book_id', $transaction->book->id], ['status', 0]])->count() }}</small>
                        </li>
                        <li class="d-flex mb-3"><i class='bx bx-list-ul'></i><small class="fw-semibold mx-2">Buku
                                diKembalikan:</small>
                            <small>{{ \App\Models\Transaction::where([['book_id', $transaction->book->id], ['status', 1]])->count() }}</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-7 col-md-7">
            <div class="card mb-4 overflow-auto" style="height: 1055px">
                <div class="card-body">
                    <small class="text-light fw-semibold mb-3">TIMELINE</small>
                    @php
                        $transactionBook = \App\Models\Transaction::where('user_id', $transaction->user->id)
                            ->orderby('created_at', 'Desc')
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
                                                    class="text-muted">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</small></strong>
                                        @elseif ($item->status == 1)
                                            <strong class="mb-2 text-success">Dikembalikan <small
                                                    class="text-muted">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</small></strong>
                                        @elseif ($item->status == 2)
                                            <strong class="mb-2 text-warning">Permintaan pinjam <small
                                                    class="text-muted">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</small></strong>
                                        @elseif ($item->status == 3)
                                            <strong class="mb-2 text-danger">Permintaan ditolak <small
                                                    class="text-muted">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</small></strong>
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
        </div>
    </div>
    <script type="text/javascript">
        setTimeout(function() {

            // Closing the alert
            $('.alert').alert('close');
        }, 5000);
    </script>
</x-app>

<x-app>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="user-profile-header-banner overflow-hidden">
                    <img src="https://source.unsplash.com/random/1000x200?sig=1" alt="Banner image" class="rounded-top">
                </div>
                <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4 ">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img src="{{ $user->photo }}" height="130" width="130" alt="user image"
                            class="d-block ms-0 ms-sm-4 rounded user-profile-img">
                    </div>
                    <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div
                            class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                                <h4>{{ $user->name }}</h4>
                                <ul
                                    class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                    <li class="list-inline-item fw-semibold">
                                        <i class="bx bx-pen"></i>
                                        @if ($user->status == 0)
                                            Siswa/i
                                        @elseif ($user->status == 1)
                                            Guru
                                        @elseif ($user->status == 2)
                                            Petugas Perpustakaan
                                        @endif
                                    </li>
                                    <li class="list-inline-item fw-semibold">
                                        <i class="bx bx-map"></i> {{ $user->address }}
                                    </li>
                                    <li class="list-inline-item fw-semibold">
                                        <i class="bx bx-calendar-alt"></i> Bergabung {{ $user->created_at }}
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
        <div class="col-xl-4 col-lg-5 col-md-5">
            <!-- About User -->
            <div class="card mb-4">
                <div class="card-body">
                    <small class="text-muted text-uppercase">About</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span
                                class="fw-semibold mx-2">Nama Lengkap:</span> <span>{{ $user->name }}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-detail"></i><span
                                class="fw-semibold mx-2">No Identitas:</span> <span>{{ $user->noId }}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span
                                class="fw-semibold mx-2">Status:</span> <span>Aktif</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span
                                class="fw-semibold mx-2">Peran:</span> <span>
                                @if ($user->status == 0)
                                    Siswa/i
                                @elseif ($user->status == 1)
                                    Guru
                                @elseif ($user->status == 2)
                                    useristrator
                                @endif
                            </span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-flag"></i><span
                                class="fw-semibold mx-2">Jenis Kelamin:</span> <span>
                                @if ($user->gender == '0')
                                    Laki-laki
                                @else
                                    Perempuan
                                @endif
                            </span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-detail"></i><span
                                class="fw-semibold mx-2">Tanggal lahir:</span> <span>{{ $user->birthday }}</span></li>
                    </ul>
                    <small class="text-muted text-uppercase">Contacts</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-phone"></i><span
                                class="fw-semibold mx-2">Telp:</span> <span> <a
                                    href="{{ url('https://api.whatsapp.com/send/?phone=' . $user->telp . '&text&type=phone_number&app_absent=0') }}">{{ $user->telp }}</a></span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-chat"></i><span
                                class="fw-semibold mx-2">Email:</span> <span>{{ $user->email }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-7 col-md-7">
            <div class="card mb-4">
                <div class="card-body">
                    <small class="text-muted text-uppercase">Overview</small>
                    <ul class="list-unstyled mt-3 mb-0">
                        @php
                            $transactionCount = \App\Models\Transaction::where('user_id', $user->id)->count();
                        @endphp
                        <li class="d-flex align-items-center mb-3">
                            <i class="bx bx-transfer"></i>
                            <span class="fw-semibold mx-2">Transaksi:</span>
                            @if ($transactionCount > 0)
                                <span>{{ number_format($transactionCount) }}</span>
                            @else
                                <span>Tidak ada transaksi</span>
                            @endif
                        </li>

                        <li class="d-flex align-items-center mb-3"><i class='bx bx-message-square-error'></i><span
                                class="fw-semibold mx-2">Pengajuan:</span>
                            <span>{{ \App\Models\Transaction::where([['user_id', $user->id], ['status', 2]])->count() }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class='bx bx-message-square-x'></i><span
                                class="fw-semibold mx-2">Ditolak:</span>
                            <span>{{ \App\Models\Transaction::where([['user_id', $user->id], ['status', 3]])->count() }}</span>
                        </li>

                        <li class="d-flex align-items-center mb-3"><i class='bx bx-message-square-dots'></i><span
                                class="fw-semibold mx-2">Peminjaman:</span>
                            <span>{{ \App\Models\Transaction::where([['user_id', $user->id], ['status', 0]])->count() }}</span>
                        </li>

                        <li class="d-flex align-items-center mb-3"><i class='bx bx-message-square-check'></i><span
                                class="fw-semibold mx-2">Selesai:</span>
                            <span>{{ \App\Models\Transaction::where([['user_id', $user->id], ['status', 1]])->count() }}</span>
                        </li>


                        <li class="d-flex align-items-center"><i class="bx bx-user"></i><span
                                class="fw-semibold mx-2">Keanggotaan:</span> <span>
                                @if ($user->isAdmin == 0)
                                    Anggota
                                @else
                                    Administrator
                                @endif
                            </span></li>
                    </ul>
                </div>
            </div>
            <div class="d-flex gap-4 justify-content-start">
                <a class="btn btn-secondary" href="/user" role="button"><i class="bx bx-arrow-back bx-xs"></i>
                    Kembali</a>
                @include('user.edit')
                <form action="/user/{{ $user->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit"><i class="bx bx-trash-alt bx-xs"></i>
                        Hapus</button>
                </form>
            </div>
        </div>
    </div>
</x-app>

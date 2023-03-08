<x-app>
    <div class="card justify-content-between">
        <div class="d-flex align-items-end row">
            <div class="col-sm-5">
                <div class="card-header">
                    <h3 class="fw-bold text-primary">Selamat datang {{ Auth::user()->name }}! 🎉</h3>
                    @if (session('status'))
                        <p class="mb-4">
                            {{ session('status') }}
                            {{ __('You are logged in!') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="col-sm-5 text-sm-left">
                <div class="card-body pb-0 px-0 px-md-4">
                    <img src="assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User"
                        data-app-dark-img="illustrations/man-with-laptop-dark.png"
                        data-app-light-img="illustrations/man-with-laptop-light.png">
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid my-4">
        <div class="col-sm">
            <div class="card mb-2">
                <div class="card-body">
                    <h4 class="card-title fw-bold">Presentesi grafis pengunjung</h4>
                    {!! $chart2->container() !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-2">
                    <div class="card-body">
                        <h4 class="card-title fw-bold">Presentasi Grafis data</h4>
                        {!! $chart->container() !!}
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card mb-6">
                    <div class="card-body">
                        <h4 class="card-title fw-bold">Daftar nama surat bebas perpustakaan</h4>
                        <ul class="p-0 m-0">
                            @foreach ($letters as $item)
                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <img src="https://api.dicebear.com/5.x/adventurer/svg?seed=Felix/{{ rand(1, 999) }}"
                                            alt="User" class="rounded">
                                    </div>
                                    <div
                                        class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <small class="text-muted d-block mb-1">{{ $item->user->noId }}</small>
                                            <h6 class="mb-0">{{ $item->user->name }}</h6>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-1">
                                            <small class="mb-0">{{ $item->date }}</small>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}
    {{ $chart2->script() }}
</x-app>

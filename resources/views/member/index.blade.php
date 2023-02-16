<x-layout>
    <div class="d-flex align-items-end row">
        <div class="col">
            <div class="card-body">
                <h5 class="card-title fw-bold text-primary">Selamat datang {{ Auth::user()->name }}! 🎉</h5>
                @if (session('status'))
                    <p class="mb-4">
                        {{ session('status') }}
                        {{ __('You are logged in!') }}
                    </p>
                @endif
            </div>
        </div>
        <div class="col-sm-5 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-4">
                <img src="assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User"
                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                    data-app-light-img="illustrations/man-with-laptop-light.png">
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
        </div>
    </div>
    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}
    {{ $chart2->script() }}

</x-layout>

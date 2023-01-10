<x-app>
    <div class="d-flex align-items-end row">
        <div class="col">
            <div class="card-body">
                <h5 class="card-title text-primary">Congratulations {{ Auth::user()->name }}! 🎉</h5>
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
                <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User"
                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                    data-app-light-img="illustrations/man-with-laptop-light.png">
            </div>
        </div>
    </div>

</x-app>

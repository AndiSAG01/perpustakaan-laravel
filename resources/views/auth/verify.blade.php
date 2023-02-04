<x-app>
    <div class="card">

        <div class="card-body">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
                </div>
            @else
                <div class="alert alert-danger text-center fw-bold" role="alert">
                    Anda belum melakukan verifikasi
                  </div>
                  {{ __('Sebelum melanjutkan, periksa email Anda untuk tautan verifikasi.') }}
                  {{ __(' Jika Anda tidak menerima email tersebut') }},
                  <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                      @csrf
                      <button type="submit"
                          class="fw-bold btn btn-link p-0 m-0 align-baseline">{{ __('klik disini untuk permintaan verifikasi ulang') }}</button>.
                  </form>
            @endif

        </div>
    </div>


</x-app>

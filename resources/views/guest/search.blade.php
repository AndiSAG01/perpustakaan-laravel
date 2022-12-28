    <x-guest>
        <div class="container my-3">
            <form action="/search" method="post">
                @csrf
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-4 col-form-label text-white">Nama Lengkap</label>
                    <div class="col-sm-8">
                            <select class="form-select form-select" name="search" id="search">
                                <option selected disabled>choose one</option>
                                @foreach ($user as $item)
                                <option value="{{$item->name}}">{{$item->name}}</option>
                                @endforeach
                                @foreach ($user as $key)
                                <option value="{{$key->noId}}">{{$key->noId}}</option>
                                @endforeach
                            </select>
                            <small class="text-white">Untuk nama maupun no. identitas yang tidak ditemukan, silahkan registrasi pada menu user.</small>
                    </div>
                </div>
                <div class="mb-3 col text-end">
                    <button type="submit" class="btn btn-outline-dark text-white">Submit</button>
                </div>
            </form>
        </div>
    </x-guest>
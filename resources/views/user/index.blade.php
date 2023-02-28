<x-translayout>
    <div class="card-body">

        @if ($message = Session::get('success'))
            <div class="alert alert-primary alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @elseif ($errors->all())
            <div class="alert alert-danger fw-bold" role="alert">Data is invalid 😣</div>
        @endif
        @include('user.store')
        <h5 class="card-header text-center">Data Transaksi </h5>
        <div class="nav-align-top mb-4 ">

            <ul class="nav nav-pills mb-3 justify-content-center" role="tablist">
                <li class="nav-item" role="presentation">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-top-teacher" aria-controls="navs-pills-top-teacher"
                        aria-selected="true">Guru</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-top-student" aria-controls="navs-pills-top-student"
                        aria-selected="true">Siswa/i</button>
                </li>
            </ul>

            <div class="tab-content mt-2">
                <div class="tab-pane fade show active" id="navs-pills-top-teacher" role="tabpanel">
                    <div class="table-responsive text-nowrap">
                        <table id="myTable" class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                        <th>No Identitas</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Keanggotaan</th>
                        <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($teacher as $no => $item)
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td>{{ $item->noId }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>@if ($item->gender == '0')
                                        Laki-laki
                                    @else
                                        Perempuan
                                    @endif</td>
                                    <td>
                                        @if ($item->status == true)
                                            Guru
                                        @else
                                            Siswa/i
                                        @endif
                                    </td>
        
                                    <td class="d-flex gap-1">
                                        <a href="/user/{{ $item->id }}/show" class="btn btn-info btn-sm">Show</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="navs-pills-top-student" role="tabpanel">
                    <div class="table-responsive text-nowrap">
                        <table id="myTable" class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                        <th>No Identitas</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Keanggotaan</th>
                        <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($student as $no => $item)
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td>{{ $item->noId }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>@if ($item->gender == '0')
                                        Laki-laki
                                    @else
                                        Perempuan
                                    @endif</td>
                                    <td>
                                        @if ($item->status == true)
                                            Guru
                                        @else
                                            Siswa/i
                                        @endif
                                    </td>
        
                                    <td class="d-flex gap-1">
                                        <a href="/user/{{ $item->id }}/show" class="btn btn-info btn-sm">Show</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        setTimeout(function() {

            // Closing the alert
            $('.alert').alert('close');
        }, 3000);
    </script>
</x-translayout>

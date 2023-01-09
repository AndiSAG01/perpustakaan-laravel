<x-app>
<div class="card-body">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
        </div>
    @elseif ($errors->all())
        <div class="alert alert-danger fw-bold" role="alert">Data is invalid 😣</div>
    @endif
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Form Surat Bebas Pustaka</h5> <small class="text-muted float-end">Merged input
                    group</small>
            </div>
            <div class="card-body">
                <form action="/letter" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama Lengkap</label>
                        <div class="col-sm-10">
                           <div class="mb-3">
                            <select class="form-select" name="user_id">
                                <option value="" selected disabled>Select one</option>
                                @foreach ($users as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                           </div>
                            @error('user_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-code">Kelas</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-code2" class="input-group-text"><i class='bx bxs-user-account'></i></span>
                                <input type="text" class="form-control" id="basic-icon-default-code"
                                    name="class" value="{{ old('class')}}" placeholder="IX ...">
                            </div>
                            @error('class')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-code">Nama Penanggung Jawab</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-code2" class="input-group-text"><i class='bx bxs-rename'></i></span>
                                <input type="text" class="form-control" id="basic-icon-default-code"
                                    name="leaderName" value="{{ old('leaderName')}}" placeholder="Enter leader name!">
                            </div>
                            @error('leaderName')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-code">Posisi Penanggung Jawab</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-code2" class="input-group-text"><i class='bx bx-street-view' ></i></span>
                                <input type="text" class="form-control" id="basic-icon-default-code"
                                    name="position" value="{{ old('position')}}" placeholder="Enter leader position!">
                            </div>
                            @error('position')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-code">No. Identitas Penanggung Jawab</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-code2" class="input-group-text"><i class='bx bx-id-card'></i></span>
                                <input type="number" class="form-control" id="basic-icon-default-code"
                                    name="noId" value="{{ old('noId')}}" placeholder="Enter leader NIP/No. Id!">
                            </div>
                            @error('noId')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <h5 class="card-header fw-bold text-center">Table Surat Keterangan</h5>
    <div class="table-responsive text-nowrap">
        <table id="myTable" class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Nama Penanggung Jawab</th>
                    <th>Posisi Penanggung Jawab</th>
                    <th>No. Identitas Penanggung Jawab</th>
                    <th>Tanggal buat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($letters as $no => $item)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->class }}</td>
                        <td>{{ $item->leaderName }}</td>
                        <td>{{ $item->position }}</td>
                        <td>{{ $item->noId }}</td>
                        <td>{{ $item->date }}</td>
                        <td class="d-flex gap-1">
                            <form action="/letter/{{ $item->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                            <a href="/letter/{{ $item->id }}/print" class="btn btn-secondary">Cetak</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    setTimeout(function() {

        // Closing the alert
        $('.alert').alert('close');
    }, 3000);
</script>
</x-app>

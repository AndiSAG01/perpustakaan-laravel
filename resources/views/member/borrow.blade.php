<div class="mt-3">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#storetransaction"
    @if (App\Models\Transaction::where('status', 2)->count() >= 2)disabled @endif >
        Pengajuan peminjaman buku
    </button>

    <!-- Modal -->
    <div class="modal fade" id="storetransaction" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Pengajuan peminjaman buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/borrow" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="col mb-3">
                            <label for="user_id" class="form-label">nama Lengkap</label>
                            <input type="text" class="form-control" name="user_id" id="user_id"
                                value="{{ Auth::user()->name }}" required readonly>
                            @error('user_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="book_id" class="form-label">judul buku</label>
                            <select class="form-select form-select" name="book_id" id="book_id">
                                <option selected disabled>Select one</option>
                                @foreach ($books as $item)
                                <option value="{{ $item->id }}" @if($item->stock == 0) disabled class="text-danger" @endif>{{ $item->title }} {{ 'Stok : '. $item->stock }}</option>
                                @endforeach
                            </select>
                            @error('book_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="submission" class="form-label">tanggal Pengajuan</label>
                            <input type="date" class="form-control" name="submission" id="submission"
                                value="{{ $day }}" readonly>
                            @error('submission')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col mb-3 d-none">
                            <label for="late_id" class="form-label">denda/perhari</label>
                            <input type="text" class="form-control" name="late_id" id="late_id"
                                value="{{ $late->body ?? '' }}" placeholder="Denda Belum diatur" required readonly>
                            @error('late_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="code">Kode</label>
    <input type="text" name="code" id="code" class="form-control" value="{{ $person->code ?? '(dibuat secara otomatis)' }}" disabled>
</div>
<div class="form-group">
    <label for="name">Nama</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $person->name }}" required>
</div>
<div class="form-group">
    <label for="address">Alamat</label>
    <textarea name="address" id="address" class="form-control" required>{{ old('address') ?? $person->address }}</textarea>
</div>
<div class="form-group">
    <label for="area">Lingkungan</label>
    <select name="area" id="area" class="form-control @error('area') is-invalid @enderror" required>
        <option selected disabled value="">Pilih dari yang tersedia...</option>
        @foreach ($areas as $area)
            <option {{ $area->id == $person->area_id ? 'selected' : '' }} value="{{ $area->id ?? '' }}">{{ $area->name }}</option>
        @endforeach
    </select>
</div>
<div class="d-flex justify-content-end">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">Batal</button>
            
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ request()->is('umat/tambah') ? 'Batal mendaftarkan jemaat baru?' : 'Batal mengubah data '.$person->name.'?' }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <div class="d-flex">
                        <a href="{{ route('people') }}" class="btn btn-danger">Ya</a>
                        <button type="button" class="btn btn-success ml-2" data-dismiss="modal">Tidak</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary ml-2">Simpan</button>
</div>
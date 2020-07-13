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
<div class="justify-content-center"></div>
<button type="submit" class="btn btn-primary">Simpan</button>
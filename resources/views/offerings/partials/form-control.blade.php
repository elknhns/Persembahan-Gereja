<div class="form-group">
    <label for="code">Kode</label>
    <input type="text" name="code" id="code" class="form-control" value="{{ $offering->code ?? '(dibuat secara otomatis)' }}" disabled>
</div>

<div class="form-group">
    <label for="scan">Scan Barcode</label>
    <input type="text" name="barcode" id="barcode" class="form-control" value="{{ $offering->person->code ?? '' }}" required onkeypress="scanBarcode(event)" @isset($mode)disabled @endisset>
</div>

<hr>
<div class="form-group">
    <label for="name">Nama</label>
    <input type="text" name="name" id="name" class="form-control" disabled value="{{ $offering->person->name ?? '' }}">
</div>
<div class="form-group">
    <label for="address">Alamat</label>
    <input type="text" name="address" id="address" class="form-control" disabled value="{{ $offering->person->address ?? '' }}">
</div>
<div class="form-group">
    <label for="area">Lingkungan</label>
    <input type="text" name="area" id="area" class="form-control" disabled value="{{ $offering->person->area->name ?? '' }}">
</div>
<input type="text" name="person_id" id="id" hidden required value="{{ $offering->person_id ?? '' }}">
<hr>

<div class="form-group">
    <label for="name">Nilai Persembahan</label>
    <input type="number" name="value" id="value" class="form-control @error('value') is-invalid @enderror" value="{{ old('value') ?? $offering->value }}" required>
    @error('value')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="d-flex justify-content-end">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">Batal</button>
            
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ request()->is('persembahan/tambah') ? 'Batal menambahkan data persembahan?' : 'Batal mengubah data persembahan ini' }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    Semua perubahan yang tidak Anda simpan akan hilang. Anda yakin ingin keluar dari halaman ini?
                </div>
                <div class="modal-footer">
                    <div class="d-flex">
                        <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Kembali</button>
                        <a href="{{ route('offerings') }}" class="btn btn-danger">Keluar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary ml-2">Simpan</button>
</div>

@push('script')
    <script>
        function scanBarcode(event)
        {
            if(event.keyCode == 13)
            {
                event.preventDefault()
                // alert(event.target.value)
                axios.get('/umat/scan/'+event.target.value)
                .then(function(response){
                    // alert(response)
                    $("#id").val(response.data.id)
                    $("#name").val(response.data.name)
                    $("#address").val(response.data.address)
                    $("#area").val(response.data.area.name)
                })
                .catch(function(error){
                    // console.log(error)
                    alert('Umat tidak ditemukan')
                })
            }
        }
    </script>
@endpush
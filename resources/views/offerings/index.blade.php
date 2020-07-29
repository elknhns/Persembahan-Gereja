@extends('layouts.app', ['title' => 'Persembahan'])

@section('content')
    <div class="d-flex justify-content-between">
        <h3>Persembahan</h3>
        <div>
            <a href="{{ route('offerings.excel') }}" class="btn btn-secondary"><i class="fa fa-print"></i> Print Laporan</a>
            <a href="{{ route('offerings.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Persembahan</a>
        </div>
    </div>
    <hr>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>JUMLAH</th>
                <th>ATAS NAMA</th>
                <th>LINGKUNGAN</th>
                <th>TANGGAL</th>
                <th width="20%">MENU</th>
            </tr>
        </thead>
        <tbody>
            @if ($offerings->count())
                @foreach ($offerings as $offering)
                    <tr>
                        <td>{{ $offering->id }}</td>
                        <td>Rp {{ number_format($offering->value) }}</td>
                        <td>{{ $offering->person->name }}</td>
                        <td>{{ $offering->person->area->name }}</td>
                        <td>{{ $offering->created_at->format('d F Y') }}</td>
                        <td class="row d-flex justify-content-center">
                            <a href="/persembahan/{{ $offering->code }}/ubah" class="btn btn-primary mr-2"><i class="fa fa-edit"></i><span class="d-none d-lg-inline"> Ubah</span></a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $offering->id }}"><i class="fa fa-trash"></i><span class="d-none d-lg-inline"> Hapus</span></button>
                                    
                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal{{ $offering->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus data persembahan?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            Anda yakin ingin hapus data persembahan {{ $offering->person->name }}?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="/persembahan/{{ $offering->code }}/hapus" method="post">
                                                @csrf
                                                @method('delete')
                                                <div class="d-flex">
                                                    <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Kembali</button>
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" style="text-align: center"><i>Tidak ada data persembahan</i></td>
                </tr>
            @endif
            
        </tbody>
    </table>
    <div class="d-flex justify-content-center">{{ $offerings->links() }}</div>
@endsection
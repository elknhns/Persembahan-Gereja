@extends('layouts.app', ['title' => 'Umat'])

@section('content')
    <div class="d-flex justify-content-between">
        <h3>
            Umat
            @isset($area)
                di {{ $area->name }}
            @endisset
        </h1>
        <a href="{{ route('people.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Umat</a>
    </div>
    <hr>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>NAMA</th>
                <th>ALAMAT</th>
                <th>LINGKUNGAN</th>
                <th width="20%">MENU</th>
            </tr>
        </thead>
        <tbody>
            @if ($people->count())
                @foreach ($people as $person)
                    <tr>
                        <td >{{ $person->id }}</td>
                        <td>{{ $person->name }}</td>
                        <td>{{ $person->address }}</td>
                        <td>
                            <a href="/lingkungan/{{ $person->area->slug }}">{{ $person->area->name }}</a>
                        </td>
                        <td class="row d-flex justify-content-center">
                            <a href="/umat/{{ $person->code }}/ubah" class="btn btn-primary mr-2"><i class="fa fa-edit"></i><span class="d-none d-lg-inline"> Ubah</span></a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $person->id }}"><i class="fa fa-trash"></i><span class="d-none d-lg-inline"> Hapus</span></button>
                                    
                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal{{ $person->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus data jemaat?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            Anda yakin ingin hapus data {{ $person->name }}?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="/umat/{{ $person->code }}/hapus" method="post">
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
                    <td colspan="5" style="text-align: center"><i>Tidak ada data umat</i></th>
                </tr>
            @endif
        </tbody>
    </table>
    <div class="d-flex justify-content-center">{{ $people->links() }}</div>
@endsection
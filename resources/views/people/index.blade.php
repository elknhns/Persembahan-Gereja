@extends('layouts.app', ['title' => 'Umat'])

@section('content')
    <div class="d-flex justify-content-between">
        <h3>Umat</h1>
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
                <th>MENU</th>
            </tr>
        </thead>
        <tbody>
            @if ($people->count())
                @foreach ($people as $person)
                    <tr>
                        <td>{{ $person->id }}</td>
                        <td>{{ $person->name }}</td>
                        <td>{{ $person->address }}</td>
                        <td>{{ $person->area->name }}</td>
                        <td>
                            <a href="/umat/{{ $person->code }}/ubah" class="btn btn-primary"><i class="fa fa-edit"></i> Ubah</a>
                            <a href="/umat/{{ $person->code }}/hapus" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" style="text-align: center"><i>Tidak ada data umat</i></th>
                </tr>
            @endif
        </tbody>
    </table>
    
@endsection
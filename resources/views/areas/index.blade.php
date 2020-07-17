@extends('layouts.app', ['title' => 'Lingkungan'])

@section('content')
    <div class="d-flex justify-content-between">
        <h3>Lingkungan</h3>
        @include('areas.modals.create')
    </div>
    <hr>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>NAMA LINGKUNGAN</th>
                <th width="15%">MENU</th>
            </tr>
        </thead>
        <tbody>
            @if ($areas->count())
                @foreach ($areas as $area)
                    <tr>
                        <td>{{ $area->id }}</td>
                        <td>{{ $area->name }}</td>
                        <td class="row d-flex justify-content-center">                            
                            @include('areas.modals.delete')
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3" style="text-align: center"><i>Tidak ada lingkungan yang terdaftar</i></td>
                </tr>
            @endif
            
        </tbody>
    </table>
    <div class="d-flex justify-content-center">{{ $areas->links() }}</div>
@endsection
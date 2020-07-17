@extends('layouts.app', ['title' => 'Ubah Data Jemaat'])

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Ubah Data Jemaat</div>
                <div class="card-body">
                    <form action="/umat/{{ $person->code }}/ubah" method="post">
                        @method('patch')
                        @csrf
                        @include('people.partials.form-control')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
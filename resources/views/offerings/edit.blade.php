@extends('layouts.app', ['title' => 'Ubah Data Persembahan'])

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Ubah Data Persembahan</div>
                <div class="card-body">
                    <form action="/persembahan/{{ $offering->code }}/ubah" method="post">
                        @method('patch')
                        @csrf
                        @include('offerings.partials.form-control')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
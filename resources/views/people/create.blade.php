@extends('layouts.app', ['title' => 'Tambah Jemaat'])

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Tambah Data Jemaat Baru</div>
                <div class="card-body">
                    <form action="{{ route('people.store') }}" method="post">
                        @csrf
                        @include('people.partials.form-control')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
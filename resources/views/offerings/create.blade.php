@extends('layouts.app', ['title' => 'Tambah Persembahan'])

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Tambah Data Persembahan Baru</div>
                <div class="card-body">
                    <form action="{{ route('offerings.store') }}" method="post">
                        @csrf
                        @include('offerings.partials.form-control')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Pelanggan</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('pelanggan.index') }}">Kembali</a>
            <br><br>
            <form action="{{ route('pelanggan.store') }}" method="POST">
                {{ csrf_field() }}

                @include ('admin.pelanggan.form', ['formMode' => 'create'])

            </form>                        
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Kamar</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('kamar.index') }}">Kembali</a>
            <br><br>
            <form action="{{ route('kamar.store') }}" method="POST">
                {{ csrf_field() }}

                @include ('admin.kamar.form', ['formMode' => 'create'])

            </form>                        
        </div>
    </div>
@endsection
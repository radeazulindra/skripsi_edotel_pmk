@extends('layouts.app')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-danger">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Barang</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('barang.index') }}">Kembali</a>
            <br><br>
            <form action="{{ route('barang.store') }}" method="POST">
                {{ csrf_field() }}

                @include ('admin.barang.form', ['formMode' => 'create'])

            </form>                        
        </div>
    </div>
@endsection
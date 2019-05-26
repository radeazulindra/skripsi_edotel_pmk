@extends('layouts.app')

@section('content')
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Barang</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('barang.index') }}">Kembali</a>
            <br><br>
            <form action="{{ route('barang.update', ['id'=>$barang->id]) }}" method="POST">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                @include ('admin.barang.form', ['formMode' => 'edit'])

            </form>                        
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-danger">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form {{$title}}</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('barangmasuk.index') }}">Kembali</a>
            <br><br>
            <form action="{{ route('barangmasuk.update', ['id'=>$bMasuk->id]) }}" method="POST" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                @include ('storekeeper.barangMasuk.form', ['formMode' => 'edit'])

            </form>                        
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('title', 'Novo Cliente')

@section('content')
<div class="container mt-4">
    <h2>Cadastrar Novo Cliente</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clientes.store') }}" method="POST" enctype="multipart/form-data">
        @include('clientes._form')
    </form>
</div>
@endsection

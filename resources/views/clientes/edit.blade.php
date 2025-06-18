@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Editar Cliente</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST" enctype="multipart/form-data">
        @include('clientes._form', ['cliente' => $cliente])
    </form>
</div>
@endsection

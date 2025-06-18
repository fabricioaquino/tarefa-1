@extends('layouts.app')

@section('title', 'Lista de Clientes')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Clientes</h2>
        <a href="{{ route('clientes.create') }}" class="btn btn-primary">Novo Cliente</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
    @endif

    <table class="table table-hover">
        <thead class="table-light">
            <tr>
                <th></th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th style="width: 160px">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($clientes as $cliente)
                <tr>
                    <td>
                        @if ($cliente->imagem)
                            <img src="{{ asset('storage/' . $cliente->imagem) }}"
                            alt="Foto de {{ $cliente->nome }}"
                            width="40"
                            height="40"
                            style="object-fit: cover; border-radius: 4px;">
                        @else
                            <span class="text-muted">Sem imagem</span>
                        @endif
                    </td>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>
                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-warning">Editar</a>

                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $cliente->id }})">
                            Excluir
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Nenhum cliente encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-4">
        {{ $clientes->links() }}
    </div>
</div>
@endsection
@csrf

@if(isset($cliente))
    @method('PUT')
@endif

<div class="mb-3">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" class="form-control" value="{{ old('nome', $cliente->nome ?? '') }}" oninput="this.value = this.value.replace(/[^A-Za-zÀ-ú\s]/g, '')">
</div>

<div class="mb-3">
    <label for="email">E-mail:</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $cliente->email ?? '') }}">
</div>

<div class="mb-3">
    <label for="telefone">Telefone:</label>
    <input type="text" name="telefone" class="form-control" value="{{ old('telefone', $cliente->telefone ?? '') }}">
</div>

<div class="mb-3">
    <label for="imagem">Foto:</label>
    <input type="file" name="imagem" class="form-control">
    
    @if(isset($cliente) && $cliente->imagem)
        <img src="{{ asset('storage/' . $cliente->imagem) }}" alt="Foto" width="80" class="mt-2">
    @endif
</div>

<button type="submit" class="btn btn-primary">
    {{ isset($cliente) ? 'Atualizar' : 'Salvar' }}
</button>
<a href="{{ route('clientes.index') }}" class="btn btn-secondary">Voltar</a>
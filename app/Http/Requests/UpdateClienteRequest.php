<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome'     => ['required', 'string', 'max:60', 'regex:/^[\pL\s\-]+$/u'],
            'email'    => ['required', 'email', 'max:80', Rule::unique('clientes', 'email')->ignore($this->cliente->id ?? null)],
            'telefone' => ['required', 'string', 'max:20', 'regex:/^[0-9\-\(\)\s]+$/'],
            'imagem'   => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required'     => 'O campo nome é obrigatório.',
            'nome.string'       => 'O campo nome deve ser uma string.',
            'nome.max'          => 'O campo nome não pode ter mais de 60 caracteres.',
            'nome.regex'        => 'O nome deve conter apenas letras e espaços.',
            'email.required'    => 'O campo email é obrigatório.',
            'email.email'       => 'O campo email deve ser um endereço de e-mail válido.',
            'email.max'         => 'O campo email não pode ter mais de 80 caracteres.',
            'email.unique'      => 'Já existe um cliente cadastrado com este e-mail.',
            'telefone.required' => 'O campo telefone é obrigatório.',
            'telefone.string'   => 'O campo telefone deve ser uma string.',
            'telefone.max'      => 'O campo telefone não pode ter mais de 20 caracteres.',
            'telefone.regex'    => 'Informe um telefone válido (somente números e símbolos permitidos: () - ).',
            'imagem.mimes'      => 'A imagem deve ser um arquivo do tipo: jpg ou png.',
            'imagem.image'      => 'O arquivo enviado deve ser uma imagem válida.',
            'imagem.max'        => 'A imagem não pode ter mais de 2MB.',
            'imagem.image'      => 'O arquivo selecionado deve ser uma imagem válida.',
        ];
    }
}

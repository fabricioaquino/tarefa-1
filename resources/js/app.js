import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

import $ from 'jquery';
import 'jquery-mask-plugin';

// Configuração do jQuery para usar o Bootstrap
$('input[name="telefone"]').mask('(00) 00000-0000');

// Função para exibir o modal de confirmação de exclusão
window.confirmDelete = function (clienteId) {
    const form = document.getElementById('deleteForm');
    form.action = `/clientes/${clienteId}`;
    const modal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
    modal.show();
};
<?php

return [

    'module' => 'Mailbox',

    'is_empty' => 'Não existe nenhuma mensagem.',

    'inbox' => [
        'title' => 'Caixa de Entrada',
    ],

    'archive' => [
        'title' => 'Arquivados',
        'messages' => [
            'success' => 'A mensagem foi movida para "Arquivados".',
        ],
    ],

    'destroy' => [
        'messages' => [
            'info' => 'Nenhuma mensagem foi selecionado.',
            'success' => 'A(s) mensagen(s) foram removida(s) com sucesso!',
        ],
    ],

    'trash' => [
        'title' => 'Lixeira',
        'messages' => [
            'success' => 'A mensagem foi movida para "Lixeira".',
        ],
    ],

    'message' => [
        'title' => 'Mensagem',
        'subject' => 'Assunto',
        'from' => 'De',

        'obs' => 'Obs.: As mensagens excluídas não irão aparecer mais em seu Mailbox.',
    ],

    'legend' => [
        'title' => 'Legenda',
        'types' => [
            'contact' => 'Contato',
            'estimate' => 'Orçamento',
            'newsletter' => 'Boletim Informativo',
            'products' => 'Produtos',
            'clients' => 'Clientes',
        ],
    ],

];

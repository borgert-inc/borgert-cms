<?php

return [

    'module' => 'Produtos',

    'submodule' => [
        'categorys' => 'Categorias',
        'contents' => 'Conteúdos',
    ],

    'categorys' => [
        'index' => [
            'title' => 'Lista de categorias (:total)',
            'is_empty' => 'Nenhuma categoria cadastrada',
        ],

        'create' => [
            'title' => 'Criar categoria',
        ],

        'edit' => [
            'title' => 'Editar categoria',
        ],

        'store' => [
            'messages' => [
                'success' => 'A categoria foi criada com sucesso!',
            ],
        ],

        'update' => [
            'messages' => [
                'success' => 'A categoria foi atualizada com sucesso!',
            ],
        ],

        'destroy' => [
            'messages' => [
                'info' => 'Nenhuma categoria foi selecionada.',
                'success' => 'A(s) categorias(s) foram removida(s) com sucesso!',
            ],
        ],
    ],

    'contents' => [
        'index' => [
            'title' => 'Lista de produtos (:total)',
            'is_empty' => 'Nenhum produto cadastrado',
        ],

        'create' => [
            'title' => 'Criar produto',
        ],

        'edit' => [
            'title' => 'Editar produto',
        ],

        'store' => [
            'messages' => [
                'success' => 'O produto foi criado com sucesso!',
            ],
        ],

        'update' => [
            'messages' => [
                'success' => 'O produto foi atualizado com sucesso!',
            ],
        ],

        'destroy' => [
            'messages' => [
                'info' => 'Nenhuma produto foi selecionado.',
                'success' => 'O(s) produto(s) foram removido(s) com sucesso!',
            ],
        ],
    ],

];

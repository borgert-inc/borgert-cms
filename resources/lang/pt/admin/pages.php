<?php

return [

    'module' => 'Páginas',

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
            'title' => 'Lista de páginas (:total)',
            'is_empty' => 'Nenhuma página cadastrada',
        ],

        'create' => [
            'title' => 'Criar página',
        ],

        'edit' => [
            'title' => 'Editar página',
        ],

        'store' => [
            'messages' => [
                'success' => 'O conteúdo foi criado com sucesso!',
            ],
        ],

        'update' => [
            'messages' => [
                'success' => 'O conteúdo foi atualizado com sucesso!',
            ],
        ],

        'destroy' => [
            'messages' => [
                'info' => 'Nenhuma conteúdo foi selecionado.',
                'success' => 'O(s) conteúdos(s) foram removido(s) com sucesso!',
            ],
        ],
    ],

];

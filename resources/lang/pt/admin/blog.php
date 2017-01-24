<?php

return [

    'module' => 'Blog',

    'submodule' => [
        'categorys' => 'Categorias',
        'comments' => 'Comments',
        'posts' => 'Posts',
    ],

    'categorys' => [
        'index' => [
            'title' => 'Lista de categorias (:total)',
            'is_empty' => 'Nenhuma categoria cadastrada.',
        ],

        'create' => [
            'title' => 'Criar categoria',
        ],

        'store' => [
            'messages' => [
                'success' => 'A categoria foi criada com sucesso!',
            ],
        ],

        'edit' => [
            'title' => 'Editar categoria',
        ],

        'update' => [
            'messages' => [
                'success' => 'A categoria foi salva com sucesso!',
            ],
        ],

        'destroy' => [
            'messages' => [
                'info' => 'Nenhuma categoria foi selecionada.',
                'success' => 'A(s) categorias(s) foram removida(s) com sucesso!',
            ],
        ],

    ],

    'comments' => [

        'is_empty' => 'Não existe comentários para este post.',

        'types' => [
            'pending' => 'Pendentes',
            'approved' => 'Aprovados',
            'reproved' => 'Reprovados',
        ],

        'index' => [
            'title' => 'Lista de comentários pendentes (:total)',
            'is_empty' => 'Não existe commentários pendentes.',
        ],

        'aproved' => [
            'title' => 'Lista de comentários aprovados (:total)',
            'is_empty' => 'Não existe commentários aprovados.',
        ],

        'aprove' => [
            'messages' => [
                'success' => 'O comentário foi aprovado com sucesso!',
            ],
        ],

        'reproved' => [
            'title' => 'Lista de comentários reprovados (:total)',
            'is_empty' => 'Não existe commentários reprovados.',
        ],

        'reprove' => [
            'messages' => [
                'success' => 'O comentário foi reprovado com sucesso!',
            ],
        ],

    ],

    'posts' => [
        'index' => [
            'title' => 'Lista de posts (:total)',
            'is_empty' => 'Nenhum post cadastrado',
        ],

        'create' => [
            'title' => 'Criar post',
        ],

        'edit' => [
            'title' => 'Editar post',
            'posted' => '<strong>:name</strong> postou mensagem em <strong>:title</strong> no blog.',
        ],

        'store' => [
            'messages' => [
                'success' => 'O post foi criado com sucesso!',
            ],
        ],

        'update' => [
            'messages' => [
                'success' => 'O post foi atualizado com sucesso',
            ],
        ],

        'destroy' => [
            'messages' => [
                'info' => 'Nenhum post foi selecionado.',
                'success' => 'O(s) post(s) foram removido(s) com sucesso!',
            ],
        ],

    ],

];

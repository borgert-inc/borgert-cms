<?php

return [

    'module' => 'Galeria de Imagens',

    'index' => [
        'title' => 'Lista de galerias de imagens (:total)',
        'is_empty' => 'Nenhuma galeria de imagens cadastrada',
    ],

    'create' => [
        'title' => 'Criar galeria de imagem',
    ],

    'edit' => [
        'title' => 'Editar galeria de imagem',
    ],

    'store' => [
        'messages' => [
            'success' => 'A galeria foi criada com sucesso!',
        ],
    ],

    'update' => [
        'messages' => [
            'success' => 'A galeria foi atualizada com sucesso!',
        ],
    ],

    'destroy' => [
        'messages' => [
            'info' => 'Nenhuma galeria foi selecionado.',
            'success' => 'A(s) galerias(s) foram removida(s) com sucesso!',
        ],
    ],

];

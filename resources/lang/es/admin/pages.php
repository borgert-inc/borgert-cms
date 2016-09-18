<?php

return [

    'module' => 'Paginas',

    'submodule' => [
        'categorys' => 'Categorias',
        'contents' => 'Contenidos',
    ],

    'categorys' => [
        'index' => [
            'title' => 'Lista de categorias (:total)',
            'is_empty' => 'Sin categorias',
        ],

        'create' => [
            'title' => 'Crear Categoria',
        ],

        'edit' => [
            'title' => 'Editar categoria',
        ],

        'store' => [
            'messages' => [
                'success' => '¡Categoria creada!',
            ],
        ],

        'update' => [
            'messages' => [
                'success' => '¡Categoria actualizada!',
            ],
        ],

        'destroy' => [
            'messages' => [
                'info' => 'Categoria no seleccionada.',
                'success' => '¡Categoria eliminada!',
            ],
        ],
    ],

    'contents' => [
        'index' => [
            'title' => 'Lista de paginas (:total)',
            'is_empty' => 'Sin paginas',
        ],

        'create' => [
            'title' => 'Crear pagina',
        ],

        'edit' => [
            'title' => 'Editar pagina',
        ],

        'store' => [
            'messages' => [
                'success' => '¡Contenido creado!',
            ],
        ],

        'update' => [
            'messages' => [
                'success' => '¡Contenido actualizado!',
            ],
        ],

        'destroy' => [
            'messages' => [
                'info' => 'Contenido no seleccionado.',
                'success' => '¡Contenido eliminado!',
            ],
        ],
    ],

];

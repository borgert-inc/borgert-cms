<?php

return [

    'module' => 'Productos',

    'submodule' => [
        'categorys' => 'Categorias',
        'contents' => 'Contenidos',
    ],

    'categorys' => [
        'index' => [
            'title' => 'Lista categorias (:total)',
            'is_empty' => 'Sin categorias',
        ],

        'create' => [
            'title' => 'Crear categoria',
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
            'title' => 'Lista de productos (:total)',
            'is_empty' => 'Sin productos',
        ],

        'create' => [
            'title' => 'Crear producto',
        ],

        'edit' => [
            'title' => 'Editar producto',
        ],

        'store' => [
            'messages' => [
                'success' => '¡Producto creado!',
            ],
        ],

        'update' => [
            'messages' => [
                'success' => '¡Producto actualizado!',
            ],
        ],

        'destroy' => [
            'messages' => [
                'info' => 'Producto no seleccionado.',
                'success' => '¡Producto Eliminado!',
            ],
        ],
    ],

];

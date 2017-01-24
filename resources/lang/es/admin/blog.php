<?php

return [

    'module' => 'Blog',

    'submodule' => [
        'categorys' => 'Categorias',
        'comments' => 'Comentarios',
        'posts' => 'Articulos',
    ],

    'categorys' => [
        'index' => [
            'title' => 'Lista de Categorias (:total)',
            'is_empty' => 'Sin Categorias.',
        ],

        'create' => [
            'title' => 'Crear categoria',
        ],

        'store' => [
            'messages' => [
                'success' => '¡Categoria creada!',
            ],
        ],

        'edit' => [
            'title' => 'Editar Categoria',
        ],

        'update' => [
            'messages' => [
                'success' => '¡Categoria actualizada!',
            ],
        ],

        'destroy' => [
            'messages' => [
                'info' => '¡Categoria no seleccionada!',
                'success' => '¡Categoria eliminada!',
            ],
        ],
    ],

    'comments' => [

        'is_empty' => 'Sin comentarios.',

        'types' => [
            'pending' => 'Pendiente',
            'approved' => 'Aprobado',
            'reproved' => 'Reprobado',
        ],

        'index' => [
            'title' => 'List of comments reviews (:total)',
            'is_empty' => 'Sin comentarios pendientes.',
        ],

        'aproved' => [
            'title' => 'Lista de comentarios aprobados (:total)',
            'is_empty' => 'Sin comentarios aprobados.',
        ],

        'aprove' => [
            'messages' => [
                'success' => '¡Comentario aprobado!',
            ],
        ],

        'reproved' => [
            'title' => 'Lista de comentarios reprobados (:total)',
            'is_empty' => 'Sin comentarios reprobados.',
        ],

        'reprove' => [
            'messages' => [
                'success' => 'Comentario rechazado!',
            ],
        ],
    ],

    'posts' => [
        'index' => [
            'title' => 'Lista de articulos (:total)',
            'is_empty' => 'Sin Articulos',
        ],

        'create' => [
            'title' => 'Crear Articulo',
        ],

        'edit' => [
            'title' => 'Editar Articulo',
            'posted' => '<strong>:name</strong> poner mensaje <strong>:title</strong> en el blog.',
        ],

        'store' => [
            'messages' => [
                'success' => '¡Articulo Creado!',
            ],
        ],

        'update' => [
            'messages' => [
                'success' => '¡Articulo Actualizado!.',
            ],
        ],

        'destroy' => [
            'messages' => [
                'info' => 'Entrada no seleccionada.',
                'success' => '¡Comentario Eliminado!',
            ],
        ],
    ],

];

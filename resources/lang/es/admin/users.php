<?php

return [

    'module' => 'Usuarios',

    'index' => [
        'title' => 'Lista de usuarios (:total)',
        'is_empty' => 'Sin usuarios',
    ],

    'create' => [
        'title' => 'Crear usuario',
    ],

    'edit' => [
        'title' => 'Editar usuario',
    ],

    'store' => [
        'messages' => [
            'success' => '¡Usuario Creado!',
        ],
    ],

    'update' => [
        'messages' => [
            'success' => '¡Usuario Actualizado!',
        ],
    ],

    'destroy' => [
        'messages' => [
            'info' => 'Usuario no seleccionado.',
            'warning' => '¡No puedes eliminarte!',
            'success' => '¡Usuario eliminado!',
        ],
    ],

    'gravatar' => [
        'title' => 'Gravatar',
        'description' => 'tu Gravatar es una imagen que te sigue de sitio a sitio apareciendo antes de tu nombre cuando tu escribes comentarios o creas articulos en un blog. Los avatares ayudan a identificarte en un articulo y en foros, asi que ¿Porque no en un sitio ?',
        'button' => 'Crear tu gavatar',
    ],

];

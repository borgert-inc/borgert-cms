<?php

return [

    'module' => 'Mailbox',

    'is_empty' => 'Sin Mensajes.',

    'inbox' => [
        'title' => 'Bandeja de Entrada',
    ],

    'archive' => [
        'title' => 'Archivados',
        'messages' => [
            'success' => 'El mensaje se movio a "Archivados".',
        ],
    ],

    'destroy' => [
        'messages' => [
            'info' => 'Mensaje no seleccionado.',
            'success' => '¡Mensaje Eliminado!',
        ],
    ],

    'trash' => [
        'title' => 'Basura',
        'messages' => [
            'success' => 'El mensaje se movio a "Basura".',
        ],
    ],

    'message' => [
        'title' => 'Mensaje',
        'subject' => 'Asunto',
        'from' => 'De',

        'obs' => 'El mensaje eliminado no volvera aparecer en tu Mailbox.',
    ],

    'legend' => [
        'title' => 'Leyenda',
        'types' => [
            'contact' => 'Contacto',
            'estimate' => 'Estimado',
            'newsletter' => 'Newsletter',
            'products' => 'Productos',
            'clients' => 'Clientes',
        ],
    ],

];

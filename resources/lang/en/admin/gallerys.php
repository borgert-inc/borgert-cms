<?php

return [

    'module' => 'Image Gallery',

    'index' => [
        'title' => 'List of image galleries (:total)',
        'is_empty' => 'None of registered images gallery',
    ],

    'create' => [
        'title' => 'Create Image Gallery',
    ],

    'edit' => [
        'title' => 'Edit Image Gallery',
    ],

    'store' => [
        'messages' => [
            'success' => 'The gallery has been successfully created!',
        ],
    ],

    'update' => [
        'messages' => [
            'success' => 'The gallery was successfully updated!',
        ],
    ],

    'destroy' => [
        'messages' => [
            'info' => 'No gallery has been selected.',
            'success' => 'The galleries were successfully removed!',
        ],
    ],

];

<?php

return [

    'module' => 'Pages',

    'submodule' => [
        'categorys' => 'Categories',
        'contents' => 'Contents',
    ],

    'categorys' => [
        'index' => [
            'title' => 'List of Categories (:total)',
            'is_empty' => 'No category registered',
        ],

        'create' => [
            'title' => 'Create category',
        ],

        'edit' => [
            'title' => 'Edit category',
        ],

        'store' => [
            'messages' => [
                'success' => 'The category has been created successfully!',
            ],
        ],

        'update' => [
            'messages' => [
                'success' => 'The category was successfully updated!',
            ],
        ],

        'destroy' => [
            'messages' => [
                'info' => 'No category was selected.',
                'success' => 'The categories were successfully removed!',
            ],
        ],
    ],

    'contents' => [
        'index' => [
            'title' => 'List of pages (:total)',
            'is_empty' => 'No pages registered',
        ],

        'create' => [
            'title' => 'Create page',
        ],

        'edit' => [
            'title' => 'Edit page',
        ],

        'store' => [
            'messages' => [
                'success' => 'The content has been created!',
            ],
        ],

        'update' => [
            'messages' => [
                'success' => 'The content has been updated successfully!',
            ],
        ],

        'destroy' => [
            'messages' => [
                'info' => 'No content has been selected.',
                'success' => 'The contents were removed successfully!',
            ],
        ],
    ],

];

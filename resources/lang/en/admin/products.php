<?php

return [

    'module' => 'Products',

    'submodule' => [
        'categorys' => 'Categories',
        'contents' => 'Contents',
    ],

    'categorys' => [
        'index' => [
            'title' => 'List of categories (:total)',
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
                'success' => 'The category was updated successfully!',
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
            'title' => 'List of products (:total)',
            'is_empty' => 'No products registered',
        ],

        'create' => [
            'title' => 'Create product',
        ],

        'edit' => [
            'title' => 'Edit product',
        ],

        'store' => [
            'messages' => [
                'success' => 'The product was created!',
            ],
        ],

        'update' => [
            'messages' => [
                'success' => 'The product has been successfully updated!',
            ],
        ],

        'destroy' => [
            'messages' => [
                'info' => 'No product was selected.',
                'success' => 'The products have been successfully removed!',
            ],
        ],
    ],

];

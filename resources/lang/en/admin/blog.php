<?php

return [

    'module' => 'Blog',

    'submodule' => [
        'categorys' => 'Categories',
        'comments' => 'Comments',
        'posts' => 'Posts',
    ],

    'categorys' => [
        'index' => [
            'title' => 'List categories (:total)',
            'is_empty' => 'No category registered.',
        ],

        'create' => [
            'title' => 'Create category',
        ],

        'store' => [
            'messages' => [
                'success' => 'The category has been created successfully!',
            ],
        ],

        'edit' => [
            'title' => 'Edit category',
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

    'comments' => [

        'is_empty' => 'No comments for this post.',

        'types' => [
            'pending' => 'Pending',
            'approved' => 'Approved',
            'reproved' => 'Reproved',
        ],

        'index' => [
            'title' => 'List of comments reviews (:total)',
            'is_empty' => 'There is no pending comments.',
        ],

        'aproved' => [
            'title' => 'List of approved comments (:total)',
            'is_empty' => 'There is no approved comments.',
        ],

        'aprove' => [
            'messages' => [
                'success' => 'The comment has been successfully approved!',
            ],
        ],

        'reproved' => [
            'title' => 'List of comments reproved (:total)',
            'is_empty' => 'No comments reproved.',
        ],

        'reprove' => [
            'messages' => [
                'success' => 'The comment has successfully fail!',
            ],
        ],
    ],

    'posts' => [
        'index' => [
            'title' => 'List of posts (:total)',
            'is_empty' => 'No registered post',
        ],

        'create' => [
            'title' => 'Create post',
        ],

        'edit' => [
            'title' => 'Edit post',
            'posted' => '<strong>:name</strong> put message <strong>:title</strong> in blog.',
        ],

        'store' => [
            'messages' => [
                'success' => 'The post was created!',
            ],
        ],

        'update' => [
            'messages' => [
                'success' => 'The post has been successfully updated.',
            ],
        ],

        'destroy' => [
            'messages' => [
                'info' => 'No entry was selected.',
                'success' => 'The posts were successfully removed!',
            ],
        ],
    ],

];

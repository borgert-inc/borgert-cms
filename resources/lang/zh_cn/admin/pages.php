<?php

return [

    'module' => '页面',

    'submodule' => [
        'categorys' => '分类',
        'contents' => '内容',
    ],

    'categorys' => [
        'index' => [
            'title' => '分类列表 (:total)',
            'is_empty' => '没有分类',
        ],

        'create' => [
            'title' => '创建分类',
        ],

        'edit' => [
            'title' => '编辑分类',
        ],

        'store' => [
            'messages' => [
                'success' => '该分类已成功创建!',
            ],
        ],

        'update' => [
            'messages' => [
                'success' => '该分类已成功更新!',
            ],
        ],

        'destroy' => [
            'messages' => [
                'info' => '未选择任何分类.',
                'success' => '这些分类已成功删除!',
            ],
        ],
    ],

    'contents' => [
        'index' => [
            'title' => '别表页 (:total)',
            'is_empty' => '没有页面',
        ],

        'create' => [
            'title' => '创建页面',
        ],

        'edit' => [
            'title' => '编辑页面',
        ],

        'store' => [
            'messages' => [
                'success' => '内容已创建!',
            ],
        ],

        'update' => [
            'messages' => [
                'success' => '内容已成功更新!',
            ],
        ],

        'destroy' => [
            'messages' => [
                'info' => '没有选择任何内容.',
                'success' => '内容已成功删除!',
            ],
        ],
    ],

];

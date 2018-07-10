<?php

return [

    'module' => '产品',

    'submodule' => [
        'categorys' => '分类',
        'contents' => '内容',
    ],

    'categorys' => [
        'index' => [
            'title' => '分类列表 (:total)',
            'is_empty' => '内有分类',
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
            'title' => '产品清单 (:total)',
            'is_empty' => '没有产品',
        ],

        'create' => [
            'title' => '创建产品',
        ],

        'edit' => [
            'title' => '编辑产品',
        ],

        'store' => [
            'messages' => [
                'success' => '该产品已创建!',
            ],
        ],

        'update' => [
            'messages' => [
                'success' => '该产品已成功更新!',
            ],
        ],

        'destroy' => [
            'messages' => [
                'info' => '没有选择产品.',
                'success' => '产品已成功删除!',
            ],
        ],
    ],

];

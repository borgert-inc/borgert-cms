<?php

return [

    'module' => '博客',

    'submodule' => [
        'categorys' => '分类',
        'comments' => '评语',
        'posts' => '帖子',
    ],

    'categorys' => [
        'index' => [
            'title' => '列表分类 (:total)',
            'is_empty' => '没有分类.',
        ],

        'create' => [
            'title' => '创建分类',
        ],

        'store' => [
            'messages' => [
                'success' => '该分类已成功创建!',
            ],
        ],

        'edit' => [
            'title' => '编辑分类',
        ],

        'update' => [
            'messages' => [
                'success' => '该分类已成功更新!',
            ],
        ],

        'destroy' => [
            'messages' => [
                'info' => '分类没有选.',
                'success' => '该分类已成功去除!',
            ],
        ],
    ],

    'comments' => [

        'is_empty' => '该贴没有评语.',

        'types' => [
            'pending' => '等待',
            'approved' => '认准',
            'reproved' => '再认准',
        ],

        'index' => [
            'title' => '评论列表 (:total)',
            'is_empty' => '没有等待评论.',
        ],

        'aproved' => [
            'title' => '认准评论列表 (:total)',
            'is_empty' => '没有认准评论.',
        ],

        'aprove' => [
            'messages' => [
                'success' => '该评论已成功通过!',
            ],
        ],

        'reproved' => [
            'title' => '被认准的评论列表 (:total)',
            'is_empty' => '没有再认准的评论.',
        ],

        'reprove' => [
            'messages' => [
                'success' => '评论认准成功', //'The comment has successfully fail!'
            ],
        ],
    ],

    'posts' => [
        'index' => [
            'title' => '帖子列表 (:total)',
            'is_empty' => '没有帖子',
        ],

        'create' => [
            'title' => '创建帖子',
        ],

        'edit' => [
            'title' => '编辑帖子',
            'posted' => '<strong>:名称</strong> 录入信息 <strong>:title</strong> 在博客.',
        ],

        'store' => [
            'messages' => [
                'success' => '帖子创建成功!',
            ],
        ],

        'update' => [
            'messages' => [
                'success' => '帖子更新成功.',
            ],
        ],

        'destroy' => [
            'messages' => [
                'info' => '没有选择任何条目.',
                'success' => '这些帖子已成功删除!',
            ],
        ],
    ],

];

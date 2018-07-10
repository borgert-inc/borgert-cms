<?php

return [

    'module' => '用户',

    'index' => [
        'title' => '用户列表 (:total)',
        'is_empty' => '没有用户',
    ],

    'create' => [
        'title' => '创建用户',
    ],

    'edit' => [
        'title' => '更新用户',
    ],

    'store' => [
        'messages' => [
            'success' => '用户已成功保存!',
        ],
    ],

    'update' => [
        'messages' => [
            'success' => '用户已成功更新!',
        ],
    ],

    'destroy' => [
        'messages' => [
            'info' => '没有选择用户.',
            'warning' => '您无法删除您自己!',
            'success' => '成功删除了用户!',
        ],
    ],

    'gravatar' => [
        'title' => 'Gravatar',
        'description' => '您的Gravatar是一个图像，当您在博客上发表评论或发布内容时，会在您的名称旁边显示您的网站。 头像有助于在博客和网络论坛上识别您的帖子，为什么不放在任何网站上?',
        'button' => '创建 gravatar',
    ],

];

<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => '这些凭据与我们的记录不符。',
    'throttle' => '登录尝试次数过多。 请再试一次 :秒。',

    // Login
    'login' => [
        'welcome' => '欢迎使用 Borgert CMS',
        'form' => [
            'email' => '电邮',
            'senha' => '密码',
            'button' => '登陆',
        ],
        'messages' => [
            'error' => '用户名或密码无效！',
        ],
        'forgot' => '忘记密码了吗？',
    ],

    // Forget Password
    'forget' => [
        'title' => '忘了我的密码',
        'form' => [
            'email' => '电邮',
            'button' => '发送新密码',
        ],
        'back' => '返回登陆',
    ],

    // E-mail
    'email' => [
        'password' => [
            'description' => '点击此处重置密码：',
        ],
    ],

    // Reset de senha
    'reset' => [
        'title' => '重置你的密码',
        'form' => [
            'email' => '电邮',
            'password' => '密码',
            'password_confirmation' => '确认密码',
            'button' => '重新定义密码',
        ],
    ],

];

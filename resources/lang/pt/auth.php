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

    'failed'   => 'Credenciais informadas não correspondem com nossos registros.',
    'throttle' => 'Você realizou muitas tentativas de login. Favor tentar novamente em :seconds segundos.',

    // Login
    'login' => [
        'welcome' => 'Bem Vindo ao Borgert CMS',
        'form' => [
            'email' => 'E-mail',
            'senha' => 'Senha',
            'button' => 'Entrar',
        ],
        'messages' => [
            'error' => 'Usuário ou senha inválido!',
        ],
        'forgot' => 'Esqueceu sua senha?',
    ],

     // Forget Password
    'forget' => [
        'title' => 'Esqueci minha senha',
        'form' => [
            'email' => 'E-mail',
            'button' => 'Enviar nova senha',
        ],
        'back' => 'Voltar ao Login',
    ],

    // E-mail
    'email' => [
        'password' => [
            'description' => 'Clique aqui para redefinir sua senha:',
        ],
    ],

    // Reset de senha
    'reset' => [
        'title' => 'Redefina sua senha',
        'form' => [
            'email' => 'E-mail',
            'password' => 'Senha',
            'password_confirmation' => 'Confirme a senha',
            'button' => 'Redefinir senha',
        ],
    ],

];

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

    'failed' => 'Estas credenciales no existen en nuestro registro.',
    'throttle' => 'Demaciados Intentos. Intenta de nuevo :seconds segundos.',

    // Login
    'login' => [
        'welcome' => 'Bienvenido a Borgert CMS',
        'form' => [
            'email' => 'E-mail',
            'senha' => 'contraseña',
            'button' => 'Iniciar sesion',
        ],
        'messages' => [
            'error' => 'Usuario or contraseña invalido!',
        ],
        'forgot' => '¿Olvidaste tu contraseña?',
    ],

    // Forget Password
    'forget' => [
        'title' => 'Olvide mi contraseña',
        'form' => [
            'email' => 'E-mail',
            'button' => 'Enviar nueva contraseña',
        ],
        'back' => 'Regreso Login',
    ],

    // E-mail
    'email' => [
        'password' => [
            'description' => 'Haz Click aqui para restaurar contraseña:',
        ],
    ],

    // Reset de senha
    'reset' => [
        'title' => 'Restablecer contraseña',
        'form' => [
            'email' => 'E-mail',
            'password' => 'Contraseña',
            'password_confirmation' => 'Confirmar la contraseña',
            'button' => 'Restablecer contraseña',
        ],
    ],

];

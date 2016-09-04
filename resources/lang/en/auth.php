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

    'failed' => 'These credentials do not match our records.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',

    // Login
    'login' => [
        'welcome' => 'Welcome to Borgert CMS',
        'form' => [
            'email' => 'E-mail',
            'senha' => 'Password',
            'button' => 'Login',
        ],
        'messages' => [
            'error' => 'Username or password is invalid!',
        ],
        'forgot' => 'Forgot your password?',
    ],

    // Forget Password
    'forget' => [
        'title' => 'Forgot my password',
        'form' => [
            'email' => 'E-mail',
            'button' => 'Send new password',
        ],
        'back' => 'Back to Login',
    ],

    // E-mail
    'email' => [
        'password' => [
            'description' => 'Click here to reset your password:',
        ],
    ],

    // Reset de senha
    'reset' => [
        'title' => 'Reset your password',
        'form' => [
            'email' => 'E-mail',
            'password' => 'Password',
            'password_confirmation' => 'Confirm the Password',
            'button' => 'Redefine password',
        ],
    ],

];

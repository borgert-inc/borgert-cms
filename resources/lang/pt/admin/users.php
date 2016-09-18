<?php

return [

    'module' => 'Usuários',

    'index' => [
        'title' => 'Lista de usuários (:total)',
        'is_empty' => 'Nenhum usuário cadastrado',
    ],

    'create' => [
        'title' => 'Criar usuário',
    ],

    'edit' => [
        'title' => 'Editar usuário',
    ],

    'store' => [
        'messages' => [
            'success' => 'O usuário foi atualizado com sucesso!',
        ],
    ],

    'update' => [
        'messages' => [
            'success' => 'O usuário foi atualizado com sucesso!',
        ],
    ],

    'destroy' => [
        'messages' => [
            'info' => 'Nenhum usuário foi selecionado.',
            'warning' => 'Você não pode excluir seu próprio usuário!',
            'success' => 'O usuário(s) removido(s) com sucesso!',
        ],
    ],

    'gravatar' => [
        'title' => 'Gravatar',
        'description' => 'Seu Gravatar é uma imagem que segue você de site à site aparecendo ao lado do seu nome quando você faz coisas como um comentário ou post em um blog. Os avatares ajudam a identificar os seus posts em blogs e fóruns na web, então porque não em qualquer site?',
        'button' => 'Crie seu gravatar',
    ],

];

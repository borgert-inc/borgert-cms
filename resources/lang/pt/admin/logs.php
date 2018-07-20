<?php

return [

    'module' => 'Log Viewer',

    'filter' => [
        'load' => 'Carregar',
    ],

    'table' => [
        'header' => [
            'level' => 'Nível',
            'context' => 'Contexto',
            'date' => 'Data',
            'content' => 'Conteúdo',
        ],
    ],

    'file' => [
        'download' => 'Download arquivo',
        'download_all' => 'Download de todos arquivos',
        'delete' => 'Apagar arquivo',
        'delete_all' => 'Apagar todos arquivos',
        'confirm' => 'Você tem certeza?',
        'ultra' => 'Arquivo de Log >50M, faça o download',
    ],

];

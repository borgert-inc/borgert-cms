<?php

return [

    'module' => 'Log Viewer',

    'filter' => [
        'load' => 'Carga',
    ],

    'table' => [
        'header' => [
            'level' => 'Nivel',
            'context' => 'Contexto',
            'date' => 'Fecha',
            'content' => 'Contenido',
        ],
    ],

    'file' => [
        'download' => 'Descargar archivo',
        'download_all' => 'Descargue todo el archivo',
        'delete' => 'Borrar archivo',
        'delete_all' => 'Borrar todos los archivos',
        'confirm' => 'Estás seguro?',
        'ultra' => 'Archivo de registro >50M, por favor descárgalo',
    ],

];

<?php

return [

    'module' => 'Log Viewer',

    'filter' => [
        'load' => 'Load',
    ],

    'table' => [
        'header' => [
            'level' => 'Level',
            'context' => 'Context',
            'date' => 'Date',
            'content' => 'Content',
        ],
    ],

    'file' => [
        'download' => 'Download file',
        'download_all' => 'Download all files',
        'delete' => 'Delete file',
        'delete_all' => 'Delete all',
        'confirm' => 'Are you sure?',
        'ultra' => 'Log file >50M, please download it',
    ],

];

<?php

return [

    'module' => 'Mailbox',

    'is_empty' => 'There is no message.',

    'inbox' => [
        'title' => 'Inbox',
    ],

    'archive' => [
        'title' => 'Archive',
        'messages' => [
            'success' => 'The message has been moved to "Archived".',
        ],
    ],

    'destroy' => [
        'messages' => [
            'info' => 'No messages were selected.',
            'success' => 'Messages were successfully removed!',
        ],
    ],

    'trash' => [
        'title' => 'Trash',
        'messages' => [
            'success' => 'The message has been moved to "Trash".',
        ],
    ],

    'message' => [
        'title' => 'Message',
        'subject' => 'Subject',
        'from' => 'From',

        'obs' => 'Obs.: The deleted messages will no longer appear in your Mailbox.',
    ],

    'legend' => [
        'title' => 'Legend',
        'types' => [
            'contact' => 'Contact',
            'estimate' => 'Estimate',
            'newsletter' => 'Newsletter',
            'products' => 'Products',
            'clients' => 'Clients',
        ],
    ],

];

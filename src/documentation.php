<?php

return [
    'patch_notes_path' => public_path('swagger/versions'),
    'space' => "\x20",
    'route_path' => public_path('swagger/routes'),
    'parameter_identify' => ':',
    'default_main_yaml' => '/actions.yaml',

    'actions' => [
        'index' => './index.yaml',
        'post' => './post.yaml',
        'show' => './show.yaml',
        'put' => './update.yaml',
        'delete' => './delete.yaml',
    ],

    'http_status_code' => [
        'ok' => 200,
        'created' => 201,
        'no_content' => 204,
        'unauthorized' => 401,
        'not_found' => 404,
        'unprocessable_entity' => 422,
    ],

    'http_status_code_text' => [
        'ok' => 'OK',
        'created' => 'Created',
        'no_content' => 'No Content',
        'unauthorized' => 'Unauthorized',
        'not_found' => 'Not Found',
        'unprocessable_entity' => 'Unprocessable Content',
    ]
];

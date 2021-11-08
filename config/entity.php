<?php

$fields = [
    [
        'key' => 'first_name',
        'required' => true,
    ],
    [
        'key' => 'last_name',
        'required' => true,
    ],
    [
        'key' => 'username',
        'required' => false,
    ],
    [
        'key' => 'email',
        'required' => false,
    ],
    [
        'key' => 'contact_number',
        'required' => false,
    ],
    [
        'key' => 'address',
        'required' => false,
    ],
];

return [
    "fields" => $fields,
];

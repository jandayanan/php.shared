<?php

return [
    "access" => [
        "permission" => [
            "type" => [
               "ledgers" => [
                   0 => "view",
                   1 => "add",
                   2 => "delete",
                   3 => "edit",
                   4 => "debit",
                   5 => "credit"
               ],
            ],
        ],
    ],

    "ledger" => [
        "base_url" => "http://services.ledger/",
    ]
];

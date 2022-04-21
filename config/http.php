<?php
/**
 * Created by PhpStorm.
 * User: jan
 * Date: 4/21/22
 * Time: 2:24 PM
 */

return [
    "microservices" => [
        "session" => [
            "class" => "Shared\Microservices\Session\SessionMicroservice",
            "slugs" => [
                "session.of.actor",
            ]
        ]
    ]
];

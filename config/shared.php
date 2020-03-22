<?php

return [
    "classmap" => [
        "models" => [
            "entity" => [
                "entity" => "App\Data\Models\Entities\Entity",
                "program" => [
                    "program" => "App\Data\Models\Entity\Program\Program",

                    "enrollments" =>[
                        "enrollments" => "App\Data\Models\Entity\Program\ProgramEnrollment",

                        "updates" => [
                            "update" => "App\Data\Models\Entity\Program\ProgramEnrollmentUpdate",

                            "costs" => [
                                "cost" => "App\Data\Models\Entity\Program\ProgramEnrollmentUpdateCost",
                            ]
                        ]
                    ]
                ]
            ],
            "face" => [
                "app" => "App\Data\Models\FaceVerify\Application",
                "entity" => "App\Data\Models\FaceVerify\Entity",
                "face" => "App\Data\Models\FaceVerify\Face",
            ],
            "geo" => [
                "definitions" => [
                    "baranggay" => "App\Data\Models\Geo\Definitions\Baranggay",
                    "city" => "App\Data\Models\Geo\Definitions\City",
                    "country" => "App\Data\Models\Geo\Definitions\Country",
                    "municipality" => "App\Data\Models\Geo\Definitions\Municipality",
                    "province" => "App\Data\Models\Geo\Definitions\Province",
                    "region" => "App\Data\Models\Geo\Definitions\Region",
                ]
            ],
            "ledger" => [
                "ledger" => "App\Data\Models\Ledger\Ledger",
                "activity" => "App\Data\Models\Ledger\LedgerActivity",
                "control" => "App\Data\Models\Ledger\LedgerControl",
            ]
        ]
    ],
    "services" => [
        "accounts",
        "filestore",
        "tenants",
    ],
    "session_salt" => "abcd",
];

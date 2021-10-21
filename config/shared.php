<?php

return [
    "classmap" => [
        "models" => [
            "hr" => [
                "payroll" => [
                    "payroll" => "App\Data\Models\Payroll\Payroll",
                    "detail" => "App\Data\Models\Payroll\PayrollDetail",
                ],
                "workforce" => [
                    "employee" => "App\Data\Models\Workforce\Employees\Employee",
                ]
            ],
            "signup" => [
                "signup" => "App\Data\Models\Signups\Signup",
                "meta" => "App\Data\Models\Signups\SignupMeta",
                "logs" => "App\Data\Models\Signups\SignupLogs",
                "map" => "App\Data\Models\Signups\SignupMetaVendorMap",
                "refer" => "App\Data\Models\Signups\SignupReferral",
            ],
            "plans" => [
                "filter" => "App\Data\Models\Plans\Filter",
                "inclusion" => "App\Data\Models\Plans\Inclusion",
                "rate" => "App\Data\Models\Plans\Rate",
                "rate_inclusion" => "App\Data\Models\Plans\RateInclusion",
                "route" => "App\Data\Models\Plans\Route",
                "speed" => "App\Data\Models\Plans\Speed",
                "vas" => "App\Data\Models\Plans\ValueAddedService",
            ],
            "entity" => [
                "entity" => "App\Data\Models\Entities\Entity",
                "meta" => "App\Data\Models\Entities\EntityMeta",
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
            ],
            'vouchers' => [
                'voucher' => \App\Data\Models\Vouchers\Voucher::class,
                'rule' => \App\Data\Models\Vouchers\VoucherRule::class,
                'use' => \App\Data\Models\Vouchers\VoucherUse::class,
            ]
        ],
        "links" => [
            "voucher" => [
                "rules" => [
                    "discount" => [
                        "percent" => "App\Links\Voucher\Rules\Discount\Percent",
                    ],
                    "restrict" => [
                        "domain" => "App\Links\Voucher\Rules\Restrict\Domain",
                        "email" => "App\Links\Voucher\Rules\Restrict\Email",
                        "plan_key" => "App\Links\Voucher\Rules\Restrict\Plan",
                    ],
                    "valid" => [
                        "day" => "App\Links\Voucher\Rules\Valid\Day",
                        "month" => "App\Links\Voucher\Rules\Valid\Month",
                        "year" => "App\Links\Voucher\Rules\Valid\Year",
                    ],

                    // region App Specific
                    "plan" => [
                        "discount" => [
                            "percent" => "App\Links\Voucher\Rules\Plan\DiscountPercent",
                            "value" => "App\Links\Voucher\Rules\Plan\DiscountValue",
                        ]
                    ]
                    // endregion App Specific
                ]
            ],
            "system" => [
                "data" => [
                    "pipes" => [
                        "salesforce" => [
                            "activation_charges" => "App\Links\DataPipes\SalesForce\ActivationChargesPipe",
                            "installation_type" => "App\Links\DataPipes\SalesForce\InstallationTypePipe",
                            "ip_type" => "App\Links\DataPipes\SalesForce\IpTypePipe",
                            "rate_plans" => "App\Links\DataPipes\SalesForce\RatePlansPipe",
                        ]
                    ]
                ]
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

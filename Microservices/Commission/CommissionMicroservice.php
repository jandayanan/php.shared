<?php

namespace Shared\Microservices\Commission;

use Shared\BaseClasses\Microservice;

/**
 * Class AccountsHost
 * @package App\Data\Providers\Microservice
 *
 *
 */
class CommissionMicroservice extends Microservice
{
    public function __construct()
    {
        $this->app_slug = "services.commission.app.code";
        $this->base_url = env("COMMISSION_API_ENDPOINT", 'http://e20v.svc.commission');
        $this->options = [];
        $this->auth_flag = true;

        parent::__construct();
    }
}

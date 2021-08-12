<?php

namespace Shared\Microservices\HR;

use Shared\BaseClasses\Microservice;

/**
 * Class AccountsHost
 * @package App\Data\Providers\Microservice
 *
 *
 */
class HRMicroservice extends Microservice
{
    public function __construct()
    {
        $this->app_slug = "services.hr.api.app.code";
        $this->base_url = env("SERVICES_API_ENDPOINT", 'http://e20v.svc.hr');
        $this->options = [];
        $this->auth_flag = true;

        parent::__construct();
    }
}

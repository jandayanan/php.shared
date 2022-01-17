<?php

namespace Shared\Microservices\Rbac;

use Shared\BaseClasses\Microservice;

/**
 * Class AccountsHost
 * @package App\Data\Providers\Microservice
 *
 *
 */
class RbacMicroservice extends Microservice
{
    public function __construct()
    {
        $this->app_slug = "services.entity.app.code";
        $this->base_url = env("ENTITY_API_ENDPOINT", 'http://e20v.svc.entity');
        $this->options = [];
        $this->auth_flag = true;

        parent::__construct();
    }
}

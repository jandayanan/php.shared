<?php

namespace Shared\Microservices\Utilities\Rbac;

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
        $this->app_slug = "services.rbac.app.code";
        $this->base_url = env("RBAC_API_ENDPOINT", 'http://services.rbac');
        $this->options = [];
        $this->auth_flag = true;

        parent::__construct();
    }
}

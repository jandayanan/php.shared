<?php

namespace Shared\Microservices\FlowControl;

use Shared\BaseClasses\Microservice;

/**
 * Class AccountsHost
 * @package App\Data\Providers\Microservice
 *
 *
 */
class FlowControlMicroservice extends Microservice
{
    public function __construct()
    {
        $this->app_slug = "services.flow.app.code";
        $this->base_url = env("FLOW_API_ENDPOINT", 'http://e20v.svc.flow');
        $this->options = [];
        $this->auth_flag = true;

        parent::__construct();
    }
}

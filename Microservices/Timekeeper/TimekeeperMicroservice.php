<?php

namespace Shared\Microservices\Timekeeper;

use Shared\BaseClasses\Microservice;

/**
 * Class AccountsHost
 * @package App\Data\Providers\Microservice
 *
 *
 */
class TimekeeperMicroservice extends Microservice
{
    public function __construct()
    {
        $this->app_slug = "services.timekeeper.app.code";
        $this->base_url = env("SCHEDULE_API_ENDPOINT", 'http://e20v.svc.timekeeper');
        $this->options = [];
        $this->auth_flag = true;

        parent::__construct();
    }
}

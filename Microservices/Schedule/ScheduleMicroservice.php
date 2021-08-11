<?php

namespace Shared\Microservices\Schedule;

use Shared\BaseClasses\Microservice;

/**
 * Class AccountsHost
 * @package App\Data\Providers\Microservice
 *
 *
 */
class ScheduleMicroservice extends Microservice
{
    public function __construct()
    {
        $this->app_slug = "services.schedule.app.code";
        $this->base_url = env("SCHEDULE_API_ENDPOINT", 'http://e20v.svc.schedule');
        $this->options = [];
        $this->auth_flag = true;

        parent::__construct();
    }
}

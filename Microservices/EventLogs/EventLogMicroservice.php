<?php

namespace Shared\Microservices\EventLogs;

use Shared\BaseClasses\Microservice;

/**
 * Class AccountsHost
 * @package App\Data\Providers\Microservice
 *
 *
 */
class EventLogMicroservice extends Microservice
{
    public function __construct()
    {
        $this->app_slug = "services.event.logs.program.app.code";
        $this->base_url = env("EVENT_LOG_API_ENDPOINT", 'http://e20v.svc.event.log');
        $this->options = [];
        $this->auth_flag = true;

        parent::__construct();
    }
}

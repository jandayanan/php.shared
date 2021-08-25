<?php

namespace Shared\Microservices\Task;

use Shared\BaseClasses\Microservice;

/**
 * Class AccountsHost
 * @package App\Data\Providers\Microservice
 *
 *
 */
class TaskMicroservice extends Microservice
{
    public function __construct()
    {
        $this->app_slug = "services.task.app.code";
        $this->base_url = env("TASK_API_ENDPOINT", 'http://e20v.svc.task');
        $this->options = [];
        $this->auth_flag = true;

        parent::__construct();
    }
}

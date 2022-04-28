<?php

namespace Shared\Microservices\Utilities\Files;

use Shared\BaseClasses\Microservice;

/**
 * Class AccountsHost
 * @package App\Data\Providers\Microservice
 *
 *
 */
class FilesMicroservice extends Microservice
{
    public function __construct()
    {
        $this->app_slug = "services.files.app.code";
        $this->base_url = env("FILES_API_ENDPOINT", 'http://e20v.svc.files');
        $this->options = [];
        $this->auth_flag = true;

        parent::__construct();
    }
}

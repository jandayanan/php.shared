<?php

namespace Shared\Microservices\Utilities\Configurations;

use Shared\BaseClasses\Microservice;

/**
 * Class AccountsHost
 * @package App\Data\Providers\Microservice
 *
 *
 */
class ConfigurationMicroservice extends Microservice
{
    public function __construct()
    {
        $this->app_slug = "services.config.app.code";
        $this->base_url = env("CONFIG_API_ENDPOINT", 'http://services.config');
        $this->options = [];
        $this->auth_flag = true;

        parent::__construct();
    }
}

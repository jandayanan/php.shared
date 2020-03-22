<?php

namespace Shared\Microservices\Utilities\Authentications;

use Shared\BaseClasses\Microservice;

/**
 * Class AccountsHost
 * @package App\Data\Providers\Microservice
 *
 *
 */
class AuthenticationMicroservice extends Microservice
{
    public function __construct()
    {
        $this->app_slug = "services.auth.app.code";
        $this->base_url = env("AUTH_API_ENDPOINT", 'http://services.auth');
        $this->options = [];
        $this->auth_flag = true;

        parent::__construct();
    }
}

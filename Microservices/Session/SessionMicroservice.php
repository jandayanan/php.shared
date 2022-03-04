<?php

namespace Shared\Microservices\Session;

use Shared\BaseClasses\Microservice;

/**
 * Class SessionMicroservice
 * @package App\Data\Providers\Microservice
 *
 *
 */
class SessionMicroservice extends Microservice
{
    public function __construct()
    {
        $this->app_slug = "services.session.app.code";
        $this->base_url = env("SESSION_API_ENDPOINT", 'http://e20v.svc.sessions');
        $this->options = [];
        $this->auth_flag = true;

        parent::__construct();
    }
}

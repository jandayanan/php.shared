<?php

namespace Shared\Controllers;

use Shared\BaseClasses\Controller;
use Shared\BaseClasses\Link;

class DefaultResponseController extends Controller {
    public function notFound(){
        return $this->httpNotFoundResponse()->json();
    }
    public function forbidden(){
        return $this->httpForbiddenResponse()->json();
    }
}
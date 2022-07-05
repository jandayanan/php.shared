<?php

namespace Shared\BaseClasses;

use Shared\Traits\Response;
use Shared\Traits\Permissioned;

/**
 * Class Schema
 * @package Shared\BaseClasses
 */
abstract class Schema
{
    use Response, Permissioned;
}

<?php

namespace Shared\BaseClasses;

use Shared\Traits\Response;

/**
 * Class Controller
 * @package App\Http\Controllers
 *
 * @function all() Retrieves all related data of a specific definition
 */
abstract class Service
{
    use Response;
}

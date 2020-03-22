<?php

namespace Shared\BaseClasses;

use Shared\Traits\Response;
use Illuminate\Console\Command as LaravelCommand;
use Illuminate\Support\Facades\Request;

/**
 * Class Command
 * @package Shared\BaseClasses
 *
 */
abstract class Command extends LaravelCommand
{
    // use Response;


    /**
     * Set response header code.
     *
     * @return void
     */
    public function json( $response )
    {
        return response()->json( $response, 200);
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: jan
 * Date: 9/13/22
 * Time: 11:57 PM
 */

namespace Shared\Traits;


use Illuminate\Support\Facades\Log;

trait Loggable
{
    protected function log( $message, $data=[], $channel='single', $type = 'info' ){
        $message = wrap_with ( self::class ) . " " . $message;
        Log::channel( $channel )
            ->$type( $message, $data );
    }
}

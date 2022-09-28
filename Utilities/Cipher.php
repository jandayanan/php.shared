<?php


namespace Shared\Utilities;


use Illuminate\Support\Facades\Log;

class Cipher
{
    protected static $salt = "test-app";

    public static function hash( $value ){

        $value = is_string ( $value)  ? $value : implode("-", $value );

        Log::info( "CIPHER LOG", [
            "salt" => self::$salt,
            "value" => $value,
            "value_type" => get_debug_type ( $value ),
        ]);

        return app_hash( self::$salt . $value );
    }
}

<?php


namespace Shared\Utilities;


use Illuminate\Support\Facades\Log;

class Cipher
{
    protected static $salt = "test-app";

    public static function hash( $value ){
        Log::info( "CIPHER LOG", [
            "salt" => self::$salt,
            "value" => $value,
        ]);

        $value = is_array ( $value ) ? implode("-", $value ) : $value;
        
        return app_hash( self::$salt . $value );
    }
}

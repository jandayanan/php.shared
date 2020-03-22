<?php


namespace Shared\Utilities;


class Cipher
{
    protected static $salt = "viewqwest.com";

    public static function hash( $value ){
        return app_hash( self::$salt . $value );
    }
}
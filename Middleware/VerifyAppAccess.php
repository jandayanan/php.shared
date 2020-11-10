<?php

namespace Shared\Middleware;

use Closure;
use Shared\Utilities\Cipher;
use Shared\Traits\Instances\Response;

class VerifyAppAccess
{
    protected $salt="viewqwest.com";


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if( env("SKIP_APP_ACCESS_CHECK", true )){

            return $next($request);

        }

        // Here is a trick for Middleware not to check against auth/login
        // or something u dont want to check against middleware

        if(false && $request->is('test/*')){

            return $next($request);

        }

        if(
            $request->header("Security-Source-Name") == null ||
            $request->header("Security-Source-Hash") == null ||
            $request->header("Security-Target-Hash") == null
        ){
            return $this->invalidateAccess( "Headers are null.");
        }

        if(
            !(
                $request->header("security-target-hash") ===
                $this->getHash( config( env("APP_SLUG") ) )
            ) ||
            !(
                $request->header("security-source-hash") ===
                $this->getHash( config( $request->header("security-source-name") ) )
            )
        ){
            return $this->invalidateAccess("Invalid hashes", [
            ]);
        }

        return $next($request);
    }

    protected function getHash( $value ){
        return Cipher::hash( $value );
    }

    protected function invalidateAccess( $message = "You do not have access to this endpoint.", $meta=[]){
        return (new Response)->httpUnauthorizedResponse([
            "message" => $message,
            "meta" => $meta,
        ])->asJson()->getResponse();
    }
}

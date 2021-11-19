<?php

namespace Shared\Middleware;

use Closure;
use Shared\Utilities\Cipher;
use Shared\Traits\Instances\Response;
use Symfony\Component\Debug\Debug;

class ForceDebug
{
    protected $salt="e20v";


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( $request->get("__debug") ){
            $check = $request->get( "__debug" )[ 'user' ] .
                $request->get( "__debug" )[ 'secret' ];

            if( validate_app_hash( $check, $request->get( "__debug" )[ 'hash' ])){
                config(["app.debug"=>true]);
                Debug::enable();
            }
        }

        return $next($request);
    }

    protected function getHash( $value ){
        return Cipher::hash( $value );
    }

    protected function invalidateAccess( $message = "You do not have access to this endpoint.", $data=[]){
        return (new Response)->httpUnauthorizedResponse([
            "message" => $message,
            "data" => $data,
        ])->asJson()->getResponse();
    }
}

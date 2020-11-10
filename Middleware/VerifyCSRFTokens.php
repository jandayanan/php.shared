<?php

namespace Shared\Middleware;

use Closure;
use Shared\Utilities\Cipher;
use Shared\Traits\Instances\Response;

class VerifyCSRFTokens
{
    protected $salt="viewqwest.com";


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  $targets
     * @return mixed
     */
    public function handle($request, Closure $next, ...$targets)
    {
        foreach( (array) $targets as $target ){
            $exists = false;

            if( $request->has("__tokens") ){
                foreach( $request->get("__tokens") as $token ){
                    if( $target === $token['target'] ){
                        $exists = true;
                    }
                }
            }

            if( !$exists ){
                return $this->invalidateAccess( "Token for target does not exist",[
                    "target" => $target,
                ]);
            }
        }

        if( $request->has("__tokens") ){

            foreach( $request->get("__tokens") as $token ){
                if( in_array( $token['target'], $targets ) ) {
                    $target = !is_null($request->get( $token[ 'target' ] )) ?
                        $request->get( $token[ 'target' ] ) :
                        $request->route()->parameter( $token[ 'target' ] );
                    if ( !validate_app_hash(
                        $target,
                        $token[ 'hash' ] ) ) {
                        return $this->invalidateAccess( "Invalid token for value", [
                            "target" => $token[ 'target' ],
                        ] );
                    }
                }
            }
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

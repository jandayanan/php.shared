<?php


namespace Shared\Schemas\Requests;


use Shared\BaseClasses\Schema;

class RequestSchema extends Schema
{
    protected $base_schematics = [
        'limit',
        'offset',
        'pagination',
    ];

    protected function transformSchema( $payload, $schematics ){
        // TODO: SWAP SCHEMATICS TO [BASE] to [PROPOSED]
        $data = [];
        foreach( $schematics as $key => $value ){
            foreach( $this->base_schematics as $target ){
                if( $value === $target ){
                    $data[ $target ] = $payload[$key];
                }
            }
        }

        return $data;
    }
}

<?php

namespace Shared\BaseClasses;

abstract class Type{

    protected $absorb;

    public function absorb( array $params ){
        foreach( $params as $key => $value ){
            if( in_array ( $key, $this->absorb ) ){
                $this->$key = $value;
            }
        }
    }
}
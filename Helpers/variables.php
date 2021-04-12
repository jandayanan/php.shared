<?php

if( !function_exists( 'object_has_trait') ){
    function object_has_trait( $trait, $object ){
        return in_array( $trait, class_uses_recursive( $object ));
    }
}

if( !function_exists( 'stringify_boolean') ){
    function stringify_boolean( $value ){
        return $value === true ? "true" : "false";
    }
}

if( !function_exists ( "swap_values") ){
    function swap_values( &$from, &$to ){
        $temp = $from;
        $from = $to;
        $to = $temp;
    }
}

if( !function_exists("resolve_data") ){
    function resolve_data( $data=null, $target="", $default="" ){

        if( isset( $data[ $target ] ) &&
            !is_null( $data[ $target ] )
        ){
            return $data[ $target ];
        }

        return $default;
    }
}

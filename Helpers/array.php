<?php

if (!function_exists("array_to_object")) {
    /**
     * @param array $array
     * @return object
     */
    function array_to_object(array $array)
    {
        return (object) $array;
    }
}

if( !function_exists("array_to_dot_notation") ){
    function array_to_dot_notation( $array, $assoc=true ){
        $iterator = new RecursiveIteratorIterator(
            new RecursiveArrayIterator( (array)$array ),
            RecursiveIteratorIterator::SELF_FIRST
        );
        $path = [];
        $flatArray = [];

        foreach ($iterator as $key => $value) {
            $path[$iterator->getDepth()] = $key;

            if (!is_array($value)) {
                if( $assoc ) {
                    $flatArray[ implode ( '.', array_slice ( $path, 0, $iterator->getDepth () + 1 ) ) ] = $value;
                } else {
                    $array_keys = array_slice ( $path, 0, $iterator->getDepth () + 1 );
                    $full_path = '';
                    foreach( $array_keys as $array_key ){
                        if( !is_numeric( $array_key ) ){
                            $full_path .= $array_key . ".";
                        }
                    }

                    $full_path .= $value;
                    $flatArray[] = $full_path;
                }
            }
        }

        return $flatArray;
    }
}

if( !function_exists ( "dot_notation_to_array") ){
    function dot_notation_to_array(&$arr, $path, $value, $separator='.') {
        $keys = explode($separator, $path);

        foreach ($keys as $key) {
            $arr = &$arr[$key];
        }

        $arr = $value;

        return $arr;
    }
}

if( !function_exists ( "get_weighted_random") ){
    /**
     * get_weighted_random()
     * Utility function for getting random values with weighting.
     * Pass in an associative array, such as array('A'=>5, 'B'=>45, 'C'=>50)
     * An array like this means that "A" has a 5% chance of being selected, "B" 45%, and "C" 50%.
     * The return value is the array key, A, B, or C in this case.  Note that the values assigned
     * do not have to be percentages.  The values are simply relative to each other.  If one value
     * weight was 2, and the other weight of 1, the value with the weight of 2 has about a 66%
     * chance of being selected.  Also note that weights should be integers.
     *
     * @param array $weightedValues
     * @return any
     */
    function get_weighted_random(array $weightedValues) {
        $rand = mt_rand(1, (int) array_sum($weightedValues));

        foreach ($weightedValues as $key => $value) {
            $rand -= $value;
            if ($rand <= 0) {
                return $key;
            }
        }
    }
}

if( !function_exists ( "implode_with_quotes") ){
    function implode_with_quotes( $glue, array $array, $quote="'" ){
        return $quote . implode( $quote . $glue . $quote , $array ) . $quote;
    }
}

if( !function_exists("is_multidimensional") ){
    function is_multidimensional( $array ){
        return count($array) !== count($array, COUNT_RECURSIVE);
    }
}

if( !function_exists("is_multidim") ){
    function is_multidim($a) {
        foreach ($a as $v) {
            if (is_array($v) || is_object ( $v)) return true;
        }
        return false;
    }
}

if( !function_exists("get_top_index") ){
    function get_top_index( $array ){
        return $array[max( array_keys( $array ) )];
    }
}

if(!function_exists('clean_array_debug')){
    function clean_array_debug( $array,  $str="__" ) {
        foreach ($array as $key => $value) {

            if(strpos($key, $str) === 0) {
                unset($array[ $key ]);
            }
        }
        return $array;
    }
}

if( !function_exists('array_keys_to_value') ){
    function array_keys_to_value( $array ){
        $result = [];
        foreach( $array as $key => $value ){
            $result[] = $key;
        }

        return $result;
    }
}

if( !function_exists( "pull_data_from_map" ) ){
    function pull_data_from_map( $data, $source ){
        $map = config( $source );

        $pulled = [];
        foreach( $map as $key => $value ){
            if( array_key_exists ( $key, $data ) ){
                $pulled[ $value ] = $data[ $key ];
            }
        }

        return $pulled;
    }
}

if( !function_exists( "pull_vas_from_map" ) ){
    function pull_vas_from_map( $data ){
        $map = [
            'ov',
            'staticip',
        ];

        $pulled = [];
        foreach( $data as $key => $value ){
            if( in_array( $value, $map ) && strpos ( $key, "account.plan.vas" ) !== false ){
                $pulled[ ] = $value;
            }
        }

        return $pulled;
    }
}


if( !function_exists( "pull_rate_data" ) ){
    function pull_rate_data( $data, $source ){
        $pulled = array_merge(
            pull_data_from_map ( $data, $source ),
            [
                "value_added_services" => pull_vas_from_map ( $data  ),
            ]
        );

        return $pulled;
    }
}

if( !function_exists ( "recursive_array_replace" ) ){
    function recursive_array_replace($find, $replace, $array){

        if (!is_array($array)) {
            return str_replace($find, $replace, $array);
        }

        $newArray = array();

        foreach ($array as $key => $value) {
            $newArray[$key] = recursive_array_replace($value);
        }

        return $newArray;
    }
}

if( !function_exists ( "recursive_array_value_replace" ) ){
    function recursive_array_value_replace($map, $target){
        foreach( $target as $k => $v ) {
            if ( is_array ( $v ) ) {
                $target[ $k ] = recursive_array_value_replace ( $map, $v );
            } else {
                foreach( $map as $key => $value ){
                    if( trim($key) === trim($v) ){
                        $target[ $k ] = $value;
                    }
                }
            }
        }

        return $target;
    }
}

if( !function_exists("explode_to_nest") ){
    function explode_to_nest( $item, $delimiter = ":",$array=[] ){
        $nested_array = [];
        $temp = &$nested_array;

        foreach(explode($delimiter, $item) as $key) {
            $temp = &$temp[$key];
        }

        return array_merge($nested_array, $array);
    }
}

if( !function_exists("pull_with_keys") ){
    function pull_with_keys( array $array, $target ){
        $result = [];
        foreach( $array as $value ){
            if( isset( $value[ $target ] ) ){
                $result[] = $value[ $target ];
            }
        }

        return $result;
    }
}

if( !function_exists ( "unset_collection") ){
    function unset_collection( array $from, array $keys ){
        foreach ($from as $key => $item) {
            if (!in_array($key, $keys)) {
                unset($from[$key]);
            }
        }

        return $from;
    }
}

if( !function_exists ( "unset_if_exists") ){
    function unset_if_exists( $target, array $array ){
        if( array_key_exists ( $target, $array) ){
            unset( $array[ $target ] );
        }

        return $array;
    }
}

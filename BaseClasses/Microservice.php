<?php


namespace Shared\BaseClasses;


use Shared\Traits\Response;
use Shared\Utilities\Cipher;
use RecursiveArrayIterator;
use RecursiveIteratorIterator;

abstract class Microservice extends Host
{
    protected $app_slug, $method, $urls = [];

    public function __construct($options = [], $url = "")
    {
        $this->urls = json_decode(
                file_get_contents( $this->getCurrentDir() . "/urls.json" )
            , true );

        parent::__construct($options, $url);
    }

    public function call( $slug, $data, $headers = [], $query=[] )
    {

        $this->buildHeaders( $headers );

        $url = $this->makeUrlFromSlug( $slug, $data, $this->method, $query );
        $method = $this->method;

        $debug = false;

        if( isset($data['__debug']['dump_url']) && $data['__debug']['dump_url'] === true ){
            var_dump( "[DEBUG][DUMP_URL]", $url );
        }

        if( isset($data['__debug']['dump_method']) && $data['__debug']['dump_method'] === true ){
            var_dump( "[DEBUG][DUMP_METHOD]", $method );
        }

        if( isset($data['__debug']['dump_params']) && $data['__debug']['dump_params'] === true ){
            var_dump( "[DEBUG][DUMP_URL]", $data );
        }

        if( $debug === true ){
            exit();
        }
        $clean_data = clean_array_debug ( $data );

        try {

            $result = $this->$method( $url, $data, $this->headers );

            if( isset($data['__debug']['dump_data']) && $data['__debug']['dump_data'] === true ){
                var_dump("[DEBUG][CLEAN DATA]", $clean_data );
            }
            if( isset($data['__debug']['dump_result']) && $data['__debug']['dump_result'] === true ){
                var_dump("[DEBUG][RESULT]", $result );
            }
            if( isset($data['__debug']['dump_url']) && $data['__debug']['dump_url'] === true ){
                var_dump("[DEBUG][URL]", $url );
            }
            if( isset($data['__debug']['die']) && $data['__debug']['die'] === true ){
                exit();
            }

            if ( !is_array( $result ) && object_has_trait(Response::class, $result)) {
                return $this->absorb($result);
            }

            if( isset( $data['__callback'] ) && is_callable( $data['__callback'])  ){
                $data['__callback']( $result, [
                    "data" => $data,
                    "headers" => $this->headers
                ]);
            }

            $code = 500;
            $message = "Successfully called microservice";
            $description = "";
            $data = [];
            $parameters = [];

            if( !is_array( $result ) ){
                if( isset($result->error) && $result->error ){
                    $message = $result->error->message;
                }

                if( $result ){
                    $code = 200;
                    $data = $result;
                }
            }

            if (isset($result->code)) {
                $code = $result->code;
            }

            if (isset($result->message)) {
                $message = trim($result->message) == "" ?: $result->message;
            }

            if (isset($result->parameters)) {
                $parameters = $result->parameters;
            }

            if (isset($result->description)) {
                $description = trim($result->description) == "" ?: $result->description;
            }

            if (!is_array( $result ) && isset($result->data)) {
                $data = $result->data;
            }

            if( is_array( $result ) ){
                $code = 200;
                $data = $result;
            }

            $this->setResponse([
                'code' => $code,
                'message' => $message,
                'description' => $description,
                'data' => array_merge((array)$data, [

                ]),
                'parameters' => array_merge((array)$parameters, [
                    "request" => [
                        "method" => $method,
                        "url" => $url,
                        "base_url" => $this->base_url,
                    ],
                    "data" => $data,
                    "result" => $result,
                ])
            ]);

        } catch (\Exception $exception) {
            dd($exception);
        }

        return $this;
    }

    protected function buildHeaders($headers = [])
    {
        $this->headers["Security-Source-Name"] = env("APP_SLUG");
        $this->headers["Security-Source-Hash"] = Cipher::hash(config(env("APP_SLUG")));
        $this->headers["Security-Target-Hash"] = Cipher::hash(config($this->app_slug));

        $this->headers = array_merge($this->headers, $headers);
    }


    protected function flattenUrls( $urls, $current_key="", $current_prefix="", $target_key="slug", $prefix_key="prefix" ){
        $compiled = [];

        if( array_key_exists ( "children", $urls ) ){
            return $this->flattenUrls ( $urls['children'], $current_key, $current_prefix, $target_key, $prefix_key );
        }

        foreach( $urls as $key => $url ){
            $new_url = ( $current_key != "" ? $current_key . "." : "" ) . $url[ $target_key ];
//            $new_prefix = ( $current_prefix != "" ? $current_prefix . "/" : "" ) . $url[ $prefix_key ];
            $new_prefix = $current_prefix . "/" . $url[ $prefix_key ];
            if( is_array( $url ) && array_key_exists ( "children", $url ) ){
//                var_dump("HAS KEY", $url);
                $recursed = $this->flattenUrls (
                    $url['children'],
                    $new_url,
                    $new_prefix,
                    $target_key,
                    $prefix_key
                );

                if( !empty( $recursed ) ){
                    foreach( $recursed as $key => $item ){
                        $compiled[ $key ] = $item;
                    }
                }
            } else {
                $url[ 'full_url' ] = $new_prefix;
                $compiled[ $new_url ] = $url;
            }
        }

        return $compiled;
    }

    protected function makeUrlFromSlug( $slug, $data = [], &$method="GET", $query=[] ){
        if( !array_key_exists ( $slug, $this->flattenUrls ( $this->urls ) ) ){
            return false;
        }

        $url = $this->flattenUrls ( $this->urls )[ $slug ];

        if( !array_key_exists ( "full_url", $url ) || trim( $url['full_url'] ) === "" ){
            return false;
        }

        $method = array_key_exists ( "method", $url ) ? $url['method'] : $method;
        $result = $url['full_url'];

        // Replace URL-based data
//        if( $method === 'GET' ){
        if( true ){
            foreach( $data as $key => $datum ){
                if ( str_contains( $key, "__" ) || is_array( $datum ) ) {
                    continue;
                }
                $result = str_replace( "{" . $key . "}", $datum, $result );
            }
        }

        if( isset( $query ) && !empty( $query ) ){
            $result .= strpos( $result, "?" ) ? "" : "?";
            foreach( (array) $query as $k => $v ){
                $result .= "&" . $k . "=" . $v;
            }
        }
        
        return $result;
    }

    protected function makeUrlFromSlug_( $slug, $data = [], &$method="GET", $query=[] )
    {
        $urls = $this->urls;
        $slug = explode( '.', $slug );

        $iterator = new RecursiveIteratorIterator(
            new RecursiveArrayIterator( (array) $urls ),
            RecursiveIteratorIterator::SELF_FIRST
        );

        $array = [ $urls['prefix'] ];
        foreach ( $slug as $slug_ ) {
            foreach ( $iterator as $key => $value ) {

                // Check whether slug exists in urls
                if ( $key == 'slug' && $value == $slug_ ) {

                    // Get every child element
                    $child = (array) $iterator->getInnerIterator();

                    $array[] = $child[ 'prefix' ];
                    if( isset( $child['method'] ) ){
                        $method = $child[ 'method' ];

                    }

                }

            }
        }

        $result = '';
        foreach( array_unique( $array ) as $value ) {
            if(!empty($value)){
                $result .= '/'.$value;
            }
        }

        // Replace URL-based data
        if( $method === 'GET' ){
            foreach( $data as $key => $datum ){
                if ( str_contains( $key, "__" ) || is_array( $datum ) ) {
                    continue;
                }
                $result = str_replace( "{" . $key . "}", $datum, $result );
            }
        }

        if( isset( $query ) && !empty( $query ) ){
            $result .= strpos( $result, "?" ) ? "" : "?";
            foreach( (array) $query as $k => $v ){
                $result .= "&" . $k . "=" . $v;
            }
        }

        return $result;
    }

    // Deprecated
    protected function buildUrlFromSlug($slug, $data = [])
    {
        $url = $this->dot_urls[$slug];
        $method = $this->getMethodFromSlug($slug);

        // Replace URL-based data
        if ($method == 'get') {
            foreach ($data as $key => $datum) {
                $url = str_replace("{" . $key . "}", $datum, $url);
            }
        }

        return (substr($url, 0, 1) === "/" ? "" : "/") . $url;
    }

    protected function getCurrentDir()
    {
        $reflector = new \ReflectionClass(get_class($this));
        return dirname($reflector->getFileName());
    }

}

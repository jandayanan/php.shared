<?php


namespace Shared\BaseClasses;


use Shared\Traits\Response;
use Shared\Utilities\Cipher;
use RecursiveArrayIterator;
use RecursiveIteratorIterator;

abstract class Vendor extends Host
{
    protected $app_slug, $method, $urls = [], $latest_url="";

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
            var_dump( $url );
        }

        if( isset($data['__debug']['dump_params']) && $data['__debug']['dump_params'] === true ){
            var_dump( $data );
        }

        if( $debug === true ){
            exit();
        }

        $clean_data = clean_array_debug ( $data );

        if( isset($data['__data']['json']) && $data['__data']['json'] === true ){
            // $clean_data = json_encode ( $clean_data );
        }

        try {
            $this->latest_url = $url;
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

            if( isset( $data['__callback'] ) && is_callable( $data['__callback'])  ){
                $data['__callback']( $result, [
                    "data" => $data,
                    "headers" => $this->headers
                ]);
            }

            $code = 500;
            $message = "Successfully called vendor endpoint";
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
                    ],
                    "data" => $data,
                ])
            ]);

        } catch (\Exception $exception) {
            dd($exception);
        }

        return $this;
    }

    protected function buildHeaders($headers = [])
    {
        $this->headers = array_merge($this->headers, $headers);
    }

    protected function makeUrlFromSlug( $slug, $data = [], &$method="GET", $query=[] )
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

        $result = "/" . implode( "/", array_unique( $array ) );

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
            $query_string = "";
            foreach( (array) $query as $k => $v ){
                $query_string .= "&" . $k . "=" . $v;
            }
            $result .= substr($query_string,1);
        }

        return str_replace("//", "/", $result);
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

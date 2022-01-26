<?php

namespace Shared\BaseClasses;

use GuzzleHttp\HandlerStack;
use Monolog\Handler\TestHandler;
use Monolog\Logger;
use Namshi\Cuzzle\Formatter\CurlFormatter;
use Namshi\Cuzzle\Middleware\CurlFormatterMiddleware;
use Shared\Traits\Response;
use \GuzzleHttp\Client;

abstract class Host
{
    use Response;

    /**
     * @var Client $client
     */
    protected $client;
    protected $config;
    protected $base_url;
    protected $options;
    protected $response_as_json = true;
    protected $response_as_standard = false;
    protected $auth_flag = false;
    protected $file_flag = false;

    protected $headers = [];

    // region Guzzle Flags
    protected $verify=false;

    /**
     * @var TestHandler $log_handler
     */
    protected $log_handler;
    // endregion Guzzle Flags

    public function __construct($options = [], $url = "")
    {
        $this->initializeClient();
    }

    /**
     * provider for "GET" api calls
     *
     * @param string $url
     * @param array $request
     * @param array $headers
     * @return mixed
     */
    public function get($url, $request = [], $headers = [])
    {

        if ($this->auth_flag === true && isset($request['request'])) {
            $headers = [
                'Authorization' => $request['request']->header('Authorization'),
            ];
        }

        $data = isset($request['request']) ? $request['request']->all() : $request;

        $path = $this->base_url . $url;

        $options = [
            'headers' => [],
        ];

        if (!empty($headers)) {
            $options['headers'] = array_merge( $options['headers'], $headers );
        }

        $options['headers'] = array_merge( $options['headers'] , $this->headers );

        if (!empty($options)) {
            $this->initializeClient($options);
        }

        return $this->fetchRawResponse('GET', $path, ['query' => $data], true, $request);
    }

    /**
     * fetching raw response from api client
     *
     * @param string $method
     * @param string $path
     * @param array $data
     * @param boolean $generate
     * @return mixed
     *
     * @return \Illuminate\Http\JsonResponse|mixed|object|\Psr\Http\Message\ResponseInterface|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function fetchRawResponse($method, $path, $data = [], $generate = false, $request=[])
    {
        $response = null;
        if( isset($data['__debug']['dump_full_path']) && $data['__debug']['dump_full_path'] == true ){
            var_dump( $data );
        }


        if( !empty( $this->headers ) ){
            if( !isset( $data['headers']) ){
                $data['headers'] = [];
            }

            $data['headers'] = array_merge( $data['headers'], $this->headers );
        }

        try {
            $response = $this->client->request($method, $path, $data);
        } catch (\GuzzleHttp\Exception\ServerException $exception) {
            $response = $exception->getResponse();
        } catch (\GuzzleHttp\Exception\ClientException $exception) {
            $response = $exception->getResponse();
        } catch (\GuzzleHttp\Exception\RequestException $exception) {
            return (object) [
                'code' => 503,
                'message' => $exception->getMessage(),
            ];
        } catch( \Exception $e ){
            dd( $e );
        }

        if( isset($request['__debug']['dump_url']) && $request['__debug']['dump_url'] == true ){
            var_dump( $path );
        }
        if( isset($request['__debug']['dump_method']) && $request['__debug']['dump_method'] == true ){
            var_dump( $method );
        }
        if( isset($request['__debug']['dump_result']) && $request['__debug']['dump_result'] == true ){
            var_dump( $response->getStatusCode (), $response );
        }
        if( isset($request['__debug']['die']) && $request['__debug']['die'] == true ){
            exit();
        }

        if ($generate) {
            return $this->generateResponse($response);
        }

        return $response;
    }

    /**
     * @param \GuzzleHttp\Psr7\Response $response
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function generateResponse(\GuzzleHttp\Psr7\Response $response)
    {
        $_response = $response;

        $response = $response->getBody()->getContents();

        if ($this->response_as_standard && !is_code_success($response->code)) {
            return response()->json($response);
        }

        if ($this->response_as_json ) {
            if( json_decode($response) !== null ){
                return json_decode($response);
            }

            return $this->setResponse([
                "code" => $_response->getStatusCode(),
                "message" => $_response->getReasonPhrase(),
            ]);
        }

        return $response;
    }

    /**
     * Initiliaze client connection.
     *
     * @param array $options
     * @param string $url
     * @return void
     */
    protected function initializeClient($options = [], $url = "")
    {
        $logger = new Logger('guzzle.to.curl'); //initialize the logger
        $this->log_handler = new TestHandler(); //test logger handler
        $logger->pushHandler($this->log_handler);

        $handler = HandlerStack::create();
        $handler->after('cookies', new CurlFormatterMiddleware($logger)); //add the cURL formatter middleware

        $url = $url === "" ? $this->base_url : $url;
        $options = array_merge($options, $this->options);
        $this->client = new Client(
            array_merge([
                "handler" => $handler,
                "base_uri" => $url,
                "verify" => $this->verify,
            ], $options)
        );
    }

    protected function setBaseUrl( $url="" ){
        if( trim( $url ) !== "" ){
            $this->base_url = $url;
        }

        return $this;
    }

    /**
     * provider for "POST" api calls
     *
     * @param string $url
     * @param array $request
     * @param array $headers
     * @return mixed
     */
    public function post($url, $request = [], $headers = [])
    {
        if ($this->auth_flag === true && isset($request['request'])) {
            $headers = [
                'Authorization' => $request['request']->header('Authorization'),
            ];
        }

        $data = isset($request['request']) ? $request['request']->all() : $request;

        $path = $this->base_url . $url;

        $options = [
            'headers' => [],
        ];

        if (!empty($headers)) {
            $options['headers'] = array_merge( $options['headers'], $headers );
        }

        if (isset($data['headers'])) {
            foreach ($data['headers'] as $key => $value) {
                $options['headers'][$key] = $value;
            }
        }

        if( isset( $data['__body'] ) && !empty( $data['__body'] ) ){
            $options['body'] = $data['__body'];
            unset( $data['__body'] );
        }

        if( isset( $data['__json'] ) && !empty( $data['__json'] ) ){
            $options['json'] = $data['__json'];
            unset( $data['__json'] );
        }

        $options['headers'] = array_merge( $options['headers'] , $this->headers );

        if (!empty($options)) {
            $this->initializeClient($options);
        }

        if (isset($data['multipart'])) {
            $post_data = [
                'multipart' => $data['multipart'],
            ];

        } else {
            $post_data = [
                'form_params' => $data,
            ];
        }

        return $this->fetchRawResponse('POST', $path, $post_data, true, $request);
    }

    public function getCurlRecords(){
        return $this->log_handler->getRecords();
    }
}

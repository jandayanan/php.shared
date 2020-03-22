<?php


namespace Shared\BaseClasses;

use Shared\Traits\CreatesApplication;
use Shared\Traits\Instances\Response;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

/**
 * Class Test
 * @package Shared\BaseClasses
 *
 * @property array $executable Executable test functions from the Child class.
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;


    protected $executable;

    /**
     * Bootstrapper for all the tests that extends this abstract class.
     * Register your cases using $executable property
     */
    public function testAll()
    {
        $this->assertTrue( true, "Running all tests... ");

        foreach( $this->executable as $key => $function ) {
            $this->writeLine( "\n" );
            $this->writeLine( "====================================" );
            $this->writeLine( "TEST FOR " . $function );
            $this->$function();
            $this->writeLine( "====================================" );
            $this->writeLine( "\n" );
        }
    }

    /**
     * @param Response $response
     * @param array $options
     *
     * @return bool
     */
    public function assertResponse( $response, $options = [] )
    {
        $this->assertTrue( $response instanceof Response, "ERROR: not an instance of Response" );
        $this->assertIsNumeric( $response->getCode(), "Error: code not numeric" );
        $this->assertNotEmpty( $response->getTitle(), "Error: title empty." );

        $failures = [];

        if ( !empty( $options ) ) {
            if ( isset( $options[ 'assertions' ] ) ) {
                foreach( $options[ 'assertions' ] as $key => $assertion ) {
                    $function = "assertTrue";
                    $target = $response->getResponse();
                    $message = isset( $assertion[ 'message' ] ) ? $assertion[ 'message' ] : "";

                    if ( isset( $assertion[ 'target' ] ) ) {
                        $target = (array)data_get( $response->getResponse(), $assertion[ 'target' ] );
                    }

                    switch ( $assertion[ 'type' ] ) {
                        case "numeric" :
                            $function = "assertIsNumeric";
                            break;

                        case "array_not_empty":
                            $function = "assertIsArray";
                            break;

                        case "not_null":
                            $function = "assertNotNull";
                            break;

                        case "success":
                            $target = $response->isSuccess();
                            break;
                    }

                    if ( isset( $assertion[ 'dump_response' ] ) && $assertion[ 'dump_response' ] === true ) {
                        var_dump( $response->getResponse() );
                    }

                    if ( isset( $assertion[ 'dump_target' ] ) && $assertion[ 'dump_target' ] === true ) {
                        var_dump( $target );
                    }

                    $info = "Asserting: " . $assertion[ 'type' ] .
                        ( isset( $assertion[ 'target' ] ) ? " for " . $assertion[ 'target' ] : "" );
                    $this->writeLine( $info );

                    try {
                        $this->$function( $target, $message );
                    } catch ( PHPUnit_Framework_ExpectationFailedException $e ) {
                        $failures[] = $e->getMessage();
                    }

                    $this->writeLine( "\n" );
                }
            }
        }

        if ( !empty( $failures ) ) {
            foreach( $failures as $failure ) {
                $this->writeLine( "FAILED AT: " . $failure );
            }

            return false;
        }

        return true;
    }

    /**
     * @param $data
     *
     * @return Response $response
     */
    public function apiTest( $data )
    {
        $url = $data['url'];
        $assertions = $data['assertions'];
        $success_message = $data['success_message'];
        $method = isset( $data['method'] ) ? $data['method'] : "GET";
        $request_data = isset( $data['data'] ) ? $data['data'] : [];

        $test_url = $this->getApiUrl( $url );

        $this->writeLine( "TEST URL: " . $test_url );

        if( isset( $data['dump_request_params'] ) && $data['dump_request_params'] ){
            var_dump( $request_data );
        }

        $result = json_decode( $this->api( $method, $test_url, $request_data )->getContent() );

        $this->assertIsObject( $result, "Result is malformed JSON." );

        $response = new Response( (array)$result );

        if( isset( $data['dump_response'] ) && $data['dump_response'] ) {
            $this->writeLine( "RESPONSE CODE: " . $response->getCode() );
            $this->writeLine( "RESPONSE TITLE: " . $response->getTitle() );
            $this->writeLine( "RESPONSE META: " . json_encode( $response->getMeta() ) );
            $this->writeLine( "\n" );
        }

        $result = $this->assertResponse( $response, $assertions );

        if ( $result === true ) {
            $this->writeLine( $success_message );
        }

        return $response;
    }

    public function api($method, $uri, array $data = [], array $headers = []){

        $files = $this->extractFilesFromDataArray($data);

        $content = json_encode($data);

        $headers = array_merge([
            'CONTENT_LENGTH' => mb_strlen($content, '8bit'),
            'CONTENT_TYPE' => 'application/json',
        ], $headers);

        return $this->call(
            $method, $uri, [], [], $files, $this->transformHeadersToServerVars($headers), $content
        );
    }

    /**
     * @param $message
     */
    public function writeLine( $message )
    {
        fwrite( STDERR, print_r( $message, TRUE ) );
        fwrite( STDERR, print_r( "\n", TRUE ) );
    }
}

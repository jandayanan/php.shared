<?php

namespace Shared\Hosts\Azure;

use Shared\BaseClasses\Microservice;

class CognitiveHost extends Microservice
{
    protected $app_slug, $method, $urls = [];

    public function __construct($options = [], $url = "")
    {
        $this->app_slug = "hosts.azure.cognitive";
        $this->base_url = env("AZURE_ENDPOINT_COGNITIVE", 'https://southeastasia.api.cognitive.microsoft.com');
        $this->options = [];
        $this->auth_flag = false;

        parent::__construct();
    }

    public function call( $slug, $data, $headers = [], $query=[] ){
        $query = array_merge( [
            "returnFaceId" => "true",
            "returnFaceLandmarks" => "false",
            "recognitionModel" => "recognition_01",
            "returnRecognitionModel" => "false",
            "detectionModel" => "detection_01",
        ], $query);

        $headers = array_merge( [
            "Ocp-Apim-Subscription-Key" => env("APP_AZURE_KEY_FACE", "__" ),
            'Content-Type' => 'application/json'
        ], $headers );

        $temp_data['__json'] = $data;

        $data = $temp_data;

        return parent::call( $slug, $data, $headers, $query );
    }
}

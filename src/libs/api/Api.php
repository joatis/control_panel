<?php
namespace joatis\ControlPanel;

class API
{
    /** @var GuzzleHttp\Client */
    private $client;
    /**  @var String */
    private $requestMethod=null;
    /**  @var String */
    private $requestBody=null;
    /**  @var Array */
    private $responseHeaders=[];
    /**  @var String */
    private $responseBody=null;

    public function _constructor($client, $requestMethod='GET', $requestBody=''){
        $this->client = $client;
        $this->requestMethod = $requestMethod;
        $this->requestBody = $requestBody;
    }

    public function getRequestMethod(){
        return $this->requestMethod;
    }

}

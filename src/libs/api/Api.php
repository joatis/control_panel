<?php 
namespace joatis\ControlPanel;

class API
{
    /** @var GuzzleHttp\Client */
    private $client;

    public function _constructor(){
        $this->client = new GuzzleHttp\Client();
    }

}

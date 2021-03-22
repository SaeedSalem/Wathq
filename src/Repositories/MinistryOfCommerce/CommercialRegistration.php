<?php

namespace SaeedSalem\Wathq\Repositories\MinistryOfCommerce;

use GuzzleHttp\Client;

class CommercialRegistration implements CommercialRegistrationInterface{

    private $client;
    
    public function __construct(Client $client)
    {
        $this->client = $client;
    }
    public function info($id)
    {
        try{
            return json_decode($this->client->get("https://api.wathq.sa/v4/commercialregistration/info/{$id}",[
                'headers' => [
                    'apiKey' => env('WATHQ_KEY')
                ]
            ])->getBody()->getContents());
        }catch(\Exception $exception){
            return (object) [
                'code' => $exception->getCode(),
                'message' => $exception->getMessage(),
            ];
        }
    }

    public function owners($id)
    {
        
    }
}
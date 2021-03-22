<?php

namespace SaeedSalem\Wathq\Repositories\MinistryOfCommerce;

use GuzzleHttp\Client;

class CommercialRegistration implements CommercialRegistrationInterface{

    protected $client;
    protected $url;
    
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->url = 'https://api.wathq.sa/v4/commercialregistration';

    }
    public function info($id)
    {
        try{
            return json_decode($this->client->get($this->url."/info/{$id}",[
                'headers' => [
                    'apiKey' => config('services.wathq.key')
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
        try{
            return json_decode($this->client->get($this->url."/owners/{$id}",[
                'headers' => [
                    'apiKey' => config('services.wathq.key')
                ]
            ])->getBody()->getContents());
        }catch(\Exception $exception){
            return (object) [
                'code' => $exception->getCode(),
                'message' => $exception->getMessage(),
            ];
        }
    }
}
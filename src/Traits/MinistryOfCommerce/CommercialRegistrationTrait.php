<?php

namespace SaeedSalem\Wathq\Traits\MinistryOfCommerce;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use SaeedSalem\Wathq\Repositories\MinistryOfCommerce\CommercialRegistrationInterface;

trait CommercialRegistrationTrait
{
    private $commercialRegistrationInterface;

    private function setCommercialRegistrationInterface()
    {
        $this->commercialRegistrationInterface = App::make(CommercialRegistrationInterface::class);
    }

    /**
     * @param string $id
     * 
     * @return object
     */
    public function getCommercialInformation($id)
    {
        $this->setCommercialRegistrationInterface();
        if(Str::length($id) == 10){
            return $this->commercialRegistrationInterface->info($id);
        }else{
            return (object) [
                'code' => 400,
                'error' => 'Commercial Registration number or entity Number must be 10 digits'
            ];
        }
    }

    /**
     * @param string $id
     * 
     * @return object
     */
    public function getCommercialOwners($id)
    {
        $this->setCommercialRegistrationInterface();
        if(Str::length($id) == 10){
            return $this->commercialRegistrationInterface->owners($id);
        }else{
            return (object) [
                'code' => 400,
                'error' => 'Commercial Registration number or entity Number must be 10 digits'
            ];
        }
    }


}

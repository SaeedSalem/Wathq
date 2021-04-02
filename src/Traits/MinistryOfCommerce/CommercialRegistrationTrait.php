<?php

namespace SaeedSalem\Wathq\Traits\MinistryOfCommerce;

use App\Models\Cr;
use App\Models\CrActivity;
use App\Models\CrBusinessType;
use App\Models\CrLocation;
use App\Models\CrStatus;
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
            $result = $this->commercialRegistrationInterface->info($id);
            return $result;
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

    public function saveCommercialRegistration($commercial)
    {
        if(property_exists($commercial, 'businessType')){
            $crBusinessType = CrBusinessType::firstOrCreate(['id' => $commercial->businessType->id],[
                'name' => $commercial->businessType->name
            ]);
        }

        if(property_exists($commercial, 'status')){
            $crStatus = CrStatus::firstOrCreate(['name_en' => $commercial->status->nameEn],[
                'name' => $commercial->status->name,
            ]);
        }

        if(property_exists($commercial, 'location')){
            $crLocation = CrLocation::firstOrCreate(['id' => $commercial->location->id], [
                'name' => $commercial->location->name
            ]);
        }

        $cr = Cr::firstOrCreate(['number' => $commercial->crNumber],[
            'entity_number' => $commercial->crEntityNumber,
            'name' => $commercial->crName,
            'hijri_issue_date' => date('Y-m-d H:i:s', strtotime($commercial->issueDate)),
            'hijri_expiry_date' => date('Y-m-d H:i:s', strtotime($commercial->expiryDate)),
            'hijri_cancellation_date' => isset($commercial->cancellation) && property_exists($commercial->cancellation, 'date')? date('Y-m-d H:i:s', strtotime($commercial->cancellation->date)):null,
            'cancellation_reason' => isset($commercial->cancellation) && property_exists($commercial->cancellation, 'reason')? $commercial->cancellation->reason:null,
            'main_number' => $commercial->crMainNumber,
            'activity_description' => $commercial->activities->description,
            'cr_business_type_id' => $crBusinessType->id??null,
            'cr_status_id' => $crStatus->id??null,
            'cr_location_id' => $crLocation->id??null
        ]);

        if(property_exists($commercial, 'activities')){
            if(property_exists($commercial->activities, 'isic'))
            foreach($commercial->activities->isic as $activity){
                $crActivity = CrActivity::firstOrCreate(['id' => $activity->id], [
                    'name' => $activity->name,
                    'name_en' => $activity->nameEN
                ]);

                $cr->CrActivity()->attach($crActivity);
            }
        }

        
    }


}

<?php

namespace SaeedSalem\Wathq\Repositories\MinistryOfCommerce;

interface CommercialRegistrationInterface{
    
    /**
     * @param string $id
     * 
     * @return object
     */
    public function info($id);

    /**
     * @param string $id
     * 
     * @return object
     */
    public function owners($id);


}
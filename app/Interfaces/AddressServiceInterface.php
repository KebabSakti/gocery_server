<?php

namespace App\Interfaces;

interface AddressServiceInterface
{
    public function getAddresses($request);

    public function getCustomerAddress($request);
}

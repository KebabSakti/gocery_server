<?php

namespace App\Services;

use App\Models\CustomerAccount;
use App\Interfaces\CustomerAccountServiceInterface;

class CustomerAccountService implements CustomerAccountServiceInterface {
    public function getCustomerAccount($id) {
        $customer = CustomerAccount::find($id);

        return $customer;
    }
}
<?php

namespace App\Services;

use App\Interfaces\CustomerAccountServiceInterface;
use App\Repositories\CustomerRepository;

class CustomerAccountService implements CustomerAccountServiceInterface {
    public function getCustomerAccount($id) {
        $customer = CustomerRepository::showCustomerAccountById($id);

        return $customer;
    }
}
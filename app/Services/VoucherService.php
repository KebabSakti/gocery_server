<?php

namespace App\Services;

use App\Interfaces\VoucherServiceInterface;

class VoucherService implements VoucherServiceInterface
{
    public function getVouchers()
    {}

    public function autoApplyVoucher($request)
    {
        $vouchers = UtilityService::autoApplyVoucher($request);

        return $vouchers;
    }
}

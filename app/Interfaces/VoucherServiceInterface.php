<?php

namespace App\Interfaces;

interface VoucherServiceInterface
{
    public function getVouchers();

    public function autoApplyVoucher($request);
}

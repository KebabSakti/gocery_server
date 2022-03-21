<?php

namespace App\Interfaces;

interface PartnerAuthServiceInterface
{
    public function access($request);

    public function revoke($request);
}

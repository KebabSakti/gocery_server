<?php

namespace App\Interfaces;

interface CartServiceInterface
{
    public function getCartItems($request);

    public function updateCarts($request);

    public function clearCart($request);

    public function stock($request);
}

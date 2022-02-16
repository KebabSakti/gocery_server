<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Interfaces\CartServiceInterface;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $service;

    public function __construct(CartServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $cart = $this->service->getCartItems($request);

        $collections = new CartResource($cart);

        return $collections;
    }

    public function update(Request $request)
    {
        $this->service->updateCarts($request);
    }

    public function delete(Request $request)
    {
        $this->service->clearCart($request);
    }
}

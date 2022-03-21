<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartItemResource;
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

        $collections = CartItemResource::collection($cart);

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

    public function stock(Request $request)
    {
        $data = $this->service->stock($request);

        return response()->json($data > 0 ? true : false);
    }
}

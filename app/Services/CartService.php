<?php

namespace App\Services;

use App\Interfaces\CartServiceInterface;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CartService implements CartServiceInterface
{
    public function getCartItems($request)
    {
        $cart = Cart::where('customer_account_uid', $request->user()->uid)->firstOrFail();

        return $cart;
    }

    public function updateCarts($request)
    {
        if (!empty($request->carts)) {
            DB::transaction(function () use ($request) {
                $cartUid = Str::uuid();

                //clear items
                $this->clearCart($request);

                $qtyTotal = [];
                $priceTotal = [];

                //update cart item
                foreach ($request->carts as $item) {
                    $product = Product::where('uid', $item['product_uid'])->firstOrFail();

                    array_push($qtyTotal, $item['item_qty_total']);
                    array_push($priceTotal, $item['item_qty_total'] * $product->final_price);

                    CartItem::insert(
                        [
                            'cart_uid' => $cartUid,
                            'product_uid' => $item['product_uid'],
                        ],
                        [
                            'uid' => Str::uuid(),
                            'item_qty_total' => $item['item_qty_total'],
                            'item_price_total' => $item['item_qty_total'] * $product->final_price,
                            'note' => $item['note'],
                        ],
                    );
                }

                //update cart
                $this->updateCartTotal([
                    'customer_account_uid' => $request->user()->uid,
                    'qty_total' => array_sum($qtyTotal),
                    'price_total' => array_sum($priceTotal),
                ]);
            });
        }
    }

    public function clearCart($request)
    {
        CartItem::where('customer_account_uid', $request->user()->uid)->delete();
    }

    private function updateCartTotal($param)
    {
        Cart::updateOrInsert(
            [
                'customer_account_uid' => $param['customer_account_uid'],
            ],
            [
                'uid' => Str::uuid(),
                'qty_total' => $param['qty_total'],
                'price_total' => $param['price_total'],
            ],
        );
    }
}

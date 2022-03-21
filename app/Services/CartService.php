<?php

namespace App\Services;

use App\Interfaces\CartServiceInterface;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CartService implements CartServiceInterface
{
    public function getCartItems($request)
    {
        $cart = CartItem::where('customer_account_uid', $request->user()->uid)->orderBy('created_at', 'desc')->get();

        return $cart;
    }

    public function updateCarts($request)
    {
        DB::transaction(function () use ($request) {
            //clear items
            $this->clearCart($request);

            if (!empty($request->carts)) {

                //update with new items
                foreach ($request->carts as $item) {
                    $product = Product::where('uid', $item['product_uid'])->firstOrFail();

                    CartItem::updateOrInsert(
                        [
                            'customer_account_uid' => $request->user()->uid,
                            'product_uid' => $item['product_uid'],
                        ],
                        [
                            'uid' => Str::uuid(),
                            'item_qty_total' => $item['item_qty_total'],
                            'item_price_total' => $item['item_qty_total'] * $product->final_price,
                            'note' => $item['note'] ?? null,
                        ],
                    );
                }
            }
        });
    }

    public function clearCart($request)
    {
        CartItem::where('customer_account_uid', $request->user()->uid)->delete();
    }

    public function stock($request)
    {
        $uids = explode(',', preg_replace('/\s+/', '', $request->uids));

        $datas = Product::where('stok', '>', 0)
            ->whereIn('uid', $uids)
            ->get();

        $total = $datas->count();

        return $total;
    }

}

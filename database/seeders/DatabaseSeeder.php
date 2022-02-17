<?php

namespace Database\Seeders;

use App\Models\CartItem;
use App\Models\CustomerAccount;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        // $cItems = [
        //     [
        //         'name' => 'Gas',
        //         'image' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1609097688/mock/gas-bottle-fullsize.svg',
        //         'color' => '0xFF884DFF'
        //     ],
        //     [
        //         'name' => 'Sembako',
        //         'image' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1630512528/ayo%20mobile/flour.svg',
        //         'color' => '0xFF0095FF'
        //     ],
        //     [
        //         'name' => 'Daging',
        //         'image' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1630512527/ayo%20mobile/steak.svg',
        //         'color' => '0xFFEE6352'
        //     ],
        //     [
        //         'name' => 'Bumbu',
        //         'image' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1630512529/ayo%20mobile/pepper.svg',
        //         'color' => '0xFFFF8900'
        //     ],
        //     [
        //         'name' => 'Ikan',
        //         'image' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1630512527/ayo%20mobile/fish.svg',
        //         'color' => '0xFFFFCF00'
        //     ],
        //     [
        //         'name' => 'Cake',
        //         'image' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1630512529/ayo%20mobile/cupcake.svg',
        //         'color' => '0xFFB83B5E'
        //     ],
        //     [
        //         'name' => 'Sayur',
        //         'image' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1630512530/ayo%20mobile/salad.svg',
        //         'color' => '0xFF83F084'
        //     ],
        //     [
        //         'name' => 'Alat Dapur',
        //         'image' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1630512529/ayo%20mobile/knives.svg',
        //         'color' => '0xFF53CDD8'
        //     ],
        //     [
        //         'name' => 'Buah',
        //         'image' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1630512527/ayo%20mobile/apple.svg',
        //         'color' => '0xFF59CD90'
        //     ],
        // ];

        // $pImages = [
        //     'https://res.cloudinary.com/vjtechsolution/image/upload/v1643719643/ayo%20mobile/photo1643719456_1.jpg',
        //     'https://res.cloudinary.com/vjtechsolution/image/upload/v1643719642/ayo%20mobile/photo1643719457_1.jpg',
        //     'https://res.cloudinary.com/vjtechsolution/image/upload/v1643719643/ayo%20mobile/photo1643719456_2.jpg',
        //     'https://res.cloudinary.com/vjtechsolution/image/upload/v1643719643/ayo%20mobile/photo1643719456.jpg',
        //     'https://res.cloudinary.com/vjtechsolution/image/upload/v1643719642/ayo%20mobile/photo1643719457.jpg',
        //     'https://res.cloudinary.com/vjtechsolution/image/upload/v1643719642/ayo%20mobile/photo1643719457_2.jpg',
        //     'https://res.cloudinary.com/vjtechsolution/image/upload/v1643719642/ayo%20mobile/photo1643719459.jpg',
        //     'https://res.cloudinary.com/vjtechsolution/image/upload/v1643719642/ayo%20mobile/photo1643719458.jpg',
        //     'https://res.cloudinary.com/vjtechsolution/image/upload/v1643719641/ayo%20mobile/photo1643719459_1.jpg',
        //     'https://res.cloudinary.com/vjtechsolution/image/upload/v1643719641/ayo%20mobile/photo1643719459_2.jpg',
        //     'https://res.cloudinary.com/vjtechsolution/image/upload/v1643719641/ayo%20mobile/photo1643719458_1.jpg',
        // ];

        // $units = [
        //     'kg',
        //     'gr',
        //     'ikat',
        //     'unit',
        //     'buah',
        //     'bijik'
        // ];

        // $ship = ['LANGSUNG', 'TERJADWAL'];

        // $type = ['GAS', 'OTHER'];

        // $banners = [
        //     'https://image.freepik.com/free-vector/realistic-sale-background-with-ripped-paper_52683-55790.jpg',
        //     'https://image.freepik.com/free-vector/gradient-colored-sale-background_52683-68460.jpg',
        //     'https://image.freepik.com/free-vector/realistic-3d-sale-background_52683-63257.jpg',
        //     'https://image.freepik.com/free-vector/gradient-colorful-sale-background_52683-56915.jpg',
        //     'https://image.freepik.com/free-vector/gradient-super-sale-background_52683-62918.jpg',
        //     'https://image.freepik.com/free-vector/flat-design-black-friday-sale-with-megaphone_52683-47165.jpg',
        // ];

        // foreach($banners as $i) {
        //     Banner::create([
        //         'uid' => Str::uuid(),
        //         'image' => $i,
        //     ]);
        // }

        // foreach($cItems as $i) {
        //     $categoryUid = Str::uuid();
        //     Category::create([
        //         'uid' => $categoryUid,
        //         'name' => $i['name'],
        //         'image' => $i['image'],
        //         'color' => $i['color'],
        //         'active' => true
        //     ]);

        //     for($i=0; $i<=1000; $i++) {
        //         $pUid = Str::uuid();
        //         $cKey = array_rand($pImages);
        //         $uKey = array_rand($units);
        //         $sKey = array_rand($ship);
        //         $tKey = array_rand($type);
        //         $shipping = $ship[$sKey];
        //         $price = $faker->numberBetween(1000, 100000);
        //         $disc = $faker->numberBetween(0, 30);
        //         $fPrice = ($disc > 0) ? $price - ($disc / 100 * $price) : $price;
        //         Product::create([
        //             'category_uid' => $categoryUid,
        //             'uid' => $pUid,
        //             'name' => $faker->sentence(),
        //             'description' => $faker->text(2000),
        //             'image' => $pImages[$cKey],
        //             'price' => $price,
        //             'discount' => $disc,
        //             'final_price' => $fPrice,
        //             'unit' => $units[$uKey],
        //             'unit_count' => $faker->numberBetween(1, 5),
        //             'max_order' =>  $faker->numberBetween(1, 5),
        //             'stok' =>  $faker->numberBetween(3, 10),
        //             'point' =>  $faker->numberBetween(0, 10),
        //             'shipping' => $shipping,
        //             'type' => $shipping == 'TERJADWAL' ? 'GROCERY' : $type[$tKey],
        //         ]);

        //         ProductStatistic::create([
        //             'product_uid' => $pUid,
        //             'uid' => Str::uuid(),
        //             'favourite' => mt_rand(1, 1000),
        //             'view' => mt_rand(1, 1000),
        //             'sold' => mt_rand(1, 1000),
        //             'search' => mt_rand(1, 1000),
        //         ]);
        //     }
        // }

        // //ORDER
        // $customer = CustomerAccount::inRandomOrder()->first()->uid;
        // $uid = Str::uuid();

        // for($i = 0; $i<= 200; $i++) {
        //     Order::create([
        //         'customer_account_uid' => $customer,
        //         'uid' => $uid,
        //         'invoice' => 'INV-'.mt_rand(100000, 999999),
        //         'qty_total' => mt_rand(1, 100),
        //         'price_total' => mt_rand(1000, 1000000),
        //         'shipping_fee' => mt_rand(5000, 25000),
        //         'pay_total' => mt_rand(20000, 1000000),
        //         'payment' => 'COD',
        //     ]);

        //     $rnd = mt_rand(1, 10);

        //     for($s = 0; $s <= $rnd; $s++) {
        //         $product = Product::inRandomOrder()->first();
        //         $qty = mt_rand(1, 20);

        //         OrderItem::create([
        //             'order_uid' => $uid,
        //             'product_uid' => $product->uid,
        //             'uid' => Str::uuid(),
        //             'name' => $product->name,
        //             'description' => $product->description,
        //             'image' => $product->image,
        //             'price' => $product->price,
        //             'discount' => $product->discount,
        //             'final_price' => $product->final_price,
        //             'unit' => $product->unit,
        //             'unit_count' => $product->unit_count,
        //             'min_order' => $product->min_order,
        //             'max_order' => $product->max_order,
        //             'stok' => $product->stok,
        //             'item_qty_total' => $qty,
        //             'item_price_total' => $product->final_price * $qty,
        //         ]);
        //     }
        // }

        //BUNDLES
        // for($b = 0; $b <= 4; $b++) {
        //     $bUid = Str::uuid();
        //     Bundle::create([
        //         'uid' => $bUid,
        //         'name' => $faker->realText(),
        //         'description' => $faker->text(500),
        //         'hidden' => false,
        //         'active' => true,
        //     ]);

        //     for($i = 0; $i<= mt_rand(10 , 50); $i++) {
        //         $pUid = Product::inRandomOrder()->first()->uid;
        //         $bItem = BundleItem::where('bundle_uid', $bUid)->where('product_uid', $pUid)->first();

        //         if($bItem == null) {
        //             BundleItem::create([
        //                 'bundle_uid' => $bUid,
        //                 'product_uid' => Product::inRandomOrder()->first()->uid,
        //                 'uid' => Str::uuid(),
        //             ]);
        //         }
        //     }
        // }

        $customers = CustomerAccount::all();

        foreach ($customers as $customer) {
            for ($i = 0; $i <= mt_rand(5, 50); $i++) {
                $product = Product::inRandomOrder()->first();

                $item = CartItem::where('customer_account_uid', $customer->uid)->where('product_uid', $product->uid)->first();

                if ($item == null) {
                    $qty = mt_rand(1, 100);
                    $total = $qty * $product->final_price;

                    CartItem::create([
                        'customer_account_uid' => $customer->uid,
                        'product_uid' => $product->uid,
                        'uid' => Str::uuid(),
                        'item_qty_total' => $qty,
                        'item_price_total' => $total,
                    ]);
                }
            }
        }

    }
}

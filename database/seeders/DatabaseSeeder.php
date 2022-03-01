<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Voucher;
use App\Models\VoucherHistory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

        DB::transaction(function () {

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

            //ORDER
            // $customer = CustomerAccount::inRandomOrder()->first()->uid;
            // $orderUid = Str::uuid();

            // for ($i = 0; $i <= 50; $i++) {
            //     $order = Order::create([
            //         'customer_account_uid' => '6cd1282d-1830-45eb-8804-bd30d94b9364',
            //         'uid' => Str::uuid(),
            //         'invoice' => 'INV-' . mt_rand(100000, 999999),
            //         'qty_total' => mt_rand(1, 100),
            //         'price_total' => mt_rand(1000, 1000000),
            //         'shipping_fee' => mt_rand(5000, 25000),
            //         'pay_total' => mt_rand(20000, 1000000),
            //         'payment' => 'COD',
            //     ]);

            //     $orderStatuses = ['AKTIF', 'SELESAI', 'BATAL'];
            //     OrderStatus::create([
            //         'order_uid' => $order->uid,
            //         'uid' => Str::uuid(),
            //         'status' => $orderStatuses[array_rand($orderStatuses)],
            //         'description' => $faker->word(),
            //     ]);

            //     ShippingAddress::create([
            //         'order_uid' => $order->uid,
            //         'uid' => Str::uuid(),
            //         'address' => $faker->address(),
            //         'latitude' => $faker->latitude(),
            //         'longitude' => $faker->longitude(),
            //         'name' => $faker->name(),
            //         'phone' => $faker->phoneNumber(),
            //     ]);

            //     $rnd = mt_rand(1, 10);
            //     for ($s = 0; $s <= $rnd; $s++) {
            //         $product = Product::inRandomOrder()->first();
            //         $qty = mt_rand(1, 20);

            //         OrderItem::create([
            //             'order_uid' => $order->uid,
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

            // $customers = CustomerAccount::all();

            // foreach ($customers as $customer) {
            //     for ($i = 0; $i <= mt_rand(5, 50); $i++) {
            //         $product = Product::inRandomOrder()->first();

            //         $item = CartItem::where('customer_account_uid', $customer->uid)->where('product_uid', $product->uid)->first();

            //         if ($item == null) {
            //             $qty = mt_rand(1, 100);
            //             $total = $qty * $product->final_price;

            //             CartItem::create([
            //                 'customer_account_uid' => $customer->uid,
            //                 'product_uid' => $product->uid,
            //                 'uid' => Str::uuid(),
            //                 'item_qty_total' => $qty,
            //                 'item_price_total' => $total,
            //             ]);
            //         }
            //     }
            // }

            // $shippings = ['LANGSUNG', 'TERJADWAL'];
            // $types = ['GAS', 'OTHER'];
            // $owner = [\Carbon\Carbon::now(), null];
            // $locations = [
            //     [-0.45215076580006364, 117.16286881586834],
            //     [-0.4690588646682283, 117.17055066196176],
            //     [-0.4779449902905804, 117.12572588235422],
            //     [-0.49130154802491394, 117.14915634775008],
            //     [-0.4926928545992707, 117.1174333898507],
            //     [-0.5156093364004719, 117.11599461656589],
            //     [-0.5037554362211607, 117.07347472041342],
            //     [-0.5228441000691095, 117.09256414946513],
            //     [-0.5365344768752721, 117.14621491007054],
            //     [-0.5458283328477403, 117.15016636622994],
            //     [-0.5208241343357212, 117.15203077911826],
            //     [-0.48923251460467543, 117.14586747185817],
            //     [-0.4518335475025211, 117.14446071666244],
            //     [-0.447463896696686, 117.13757223586926],
            //     [-0.42937837044791316, 117.13908952242832],
            //     [-0.43186665002541574, 117.1560831319475],
            //     [-0.42500870645844996, 117.16567238318726],
            // ];

            // foreach ($locations as $location) {
            //     $ship = $shippings[array_rand($shippings)];
            //     $partner = Partner::create([
            //         'uid' => Str::uuid(),
            //         'name' => 'Mitra Gocery ' . $faker->firstName(),
            //         'address' => $faker->address(),
            //         'phone' => $faker->phoneNumber(),
            //         'shipping' => $ship,
            //         'type' => $ship == 'TERJADWAL' ? 'GROCERY' : $types[array_rand($types)],
            //         'latitude' => $location[0],
            //         'longitude' => $location[1],
            //         'online' => true,
            //         'active' => true,
            //     ]);

            //     for ($i = 0; $i <= 10; $i++) {
            //         $cEmail = $faker->email();
            //         $courier = CourierAccount::create([
            //             'partner_uid' => $partner->uid,
            //             'uid' => Str::uuid(),
            //             'username' => $cEmail,
            //             'password' => bcrypt(12345),
            //             'active' => true,
            //             'owner' => $owner[array_rand($owner)],
            //         ]);

            //         CourierProfile::create([
            //             'courier_account_uid' => $courier->uid,
            //             'uid' => Str::uuid(),
            //             'name' => $faker->name(),
            //             'email' => $cEmail,
            //             'phone' => $faker->phoneNumber(),
            //             'picture' => 'https://loremflickr.com/350/350/face,person,actor?random=' . mt_rand(1, 100),
            //         ]);
            //     }
            // }

            // AppConfig::create([
            //     'uid' => Str::uuid(),
            //     'key' => 'TERJADWAL_FEE',
            //     'value' => '10000',
            // ]);

            // ShippingTime::create([
            //     'uid' => Str::uuid(),
            //     'time' => '22:00:00',
            // ]);

            // PaymentChannel::create([
            //     'uid' => Str::uuid(),
            //     'channel_code' => 'COD',
            //     'name' => 'COD Cash On Delivery',
            //     'channel_category' => 'COD',
            //     'picture' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1627400333/ayo%20mobile/cod_edit.png',
            //     'active' => true,
            // ]);

            // PaymentChannel::create([
            //     'uid' => Str::uuid(),
            //     'channel_code' => 'ALFAMART',
            //     'name' => 'Alfamart retail outlet',
            //     'channel_category' => 'RETAIL_OUTLET',
            //     'picture' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1627370428/ayo%20mobile/AnyConv.com__alfamart.png',
            //     'active' => true,
            // ]);

            // PaymentChannel::create([
            //     'uid' => Str::uuid(),
            //     'channel_code' => 'OVO',
            //     'name' => 'OVO e-wallet',
            //     'channel_category' => 'EWALLET',
            //     'picture' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1645681088/ayo%20mobile/Logo_ovo_purple.svg.png',
            //     'active' => true,
            // ]);

            // PaymentChannel::create([
            //     'uid' => Str::uuid(),
            //     'channel_code' => 'DANA',
            //     'name' => 'DANA e-wallet',
            //     'channel_category' => 'EWALLET',
            //     'picture' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1645681309/ayo%20mobile/1200px-Logo_dana_blue.svg.png',
            //     'active' => true,
            // ]);

            // PaymentChannel::create([
            //     'uid' => Str::uuid(),
            //     'channel_code' => 'LINKAJA',
            //     'name' => 'LINKAJA e-wallet',
            //     'channel_category' => 'EWALLET',
            //     'picture' => 'https://res.cloudinary.com/vjtechsolution/image/upload/v1645681407/ayo%20mobile/Logo_Link_Aja.png',
            //     'active' => true,
            // ]);

            for ($i = 0; $i < 1; $i++) {
                // Voucher::create([
                //     'uid' => Str::uuid(),
                //     'title' => $faker->realText(20),
                //     'code' => strtoupper($faker->word(5)),
                //     'description' => $faker->realText(50),
                //     'image' => 'https://loremflickr.com/350/350/face,person,actor?random=' . mt_rand(1, 100),
                //     'max' => 3,
                //     'amount' => mt_rand(1000, 10000),
                //     'start_at' => Carbon::now(),
                //     'expired_at' => Carbon::now()->addDays(mt_rand(1, 30)),
                //     'hidden' => false,
                //     'active' => true,
                // ]);

                $order = Order::where('customer_account_uid', '6cd1282d-1830-45eb-8804-bd30d94b9364')->inRandomOrder()->first();

                $voucher = Voucher::inRandomOrder()->first();

                VoucherHistory::create([
                    'voucher_uid' => 'f2a8d8a1-8f64-44e0-8120-37ef0e91160e',
                    'order_uid' => $order->uid,
                    'uid' => Str::uuid(),
                ]);
            }

        });

    }
}

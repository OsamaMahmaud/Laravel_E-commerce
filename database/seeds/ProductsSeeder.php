<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\products;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('products')->insert([
        //     'name' => Str::random(10),
        //     'description'=>Str::random(10),
        //     'image' => Str::random(10).'jpg',
        //     'price'=> 0,
        //     'colors'=>json_encode(['red','blue']),
        //     'size'=> json_encode(['S','M','L' ]),
        //     'discount_price'=>0,
        //     'category_id'=> null,

        // ]);

         factory(App\Models\products::class, 10)->create();

    }
}

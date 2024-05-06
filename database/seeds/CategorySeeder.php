<?php


use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\categories;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('categories')->insert([
        //         'name' => Str::random(10),
        //         'image' => Str::random(10).'jpg',
        //         'parent_id' => null,

        //     ]);

        factory(App\Models\categories::class, 10)->create();
    }
}

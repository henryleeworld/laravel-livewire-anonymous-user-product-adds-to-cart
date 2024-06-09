<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => __('Rising Freedom Gundam Gundam Seed Freedom, Bandai Hobby HGCE 1/144 Scale Model Kit'),
            'price' => 3300,
        ]);
        Product::create([
            'name' => __('Immortal Justice Gundam Gundam Seed Freedom, Bandai Hobby HGCE 1/144 Scale Model Kit'),
            'price' => 2600,
        ]);
        Product::create([
            'name' => __('Bandai Hobby - Mobile Suit Gundam Seed - Freedom Gundam, Bandai Spirits Master Grade SD Model Kit'),
            'price' => 5100,
        ]);
        Product::create([
            'name' => __('Prize A Freedom Gundam (Bust Figure) Ichiban Kuji Mobile Suit Gundam SEED'),
            'price' => 10800,
        ]);
    }
}

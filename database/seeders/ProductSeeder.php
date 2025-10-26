<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create(['name'=>'Notebook','sku'=>'NB001','price'=>120.00,'stock'=>10]);
        Product::create(['name'=>'Pen','sku'=>'PN001','price'=>5.50,'stock'=>100]);
    }

    public function run(): void
    {
        $this->call(ProductSeeder::class);
    }
}

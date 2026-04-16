<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductOrder;

class ProductOrderSeeder extends Seeder
{
    public function run(): void
    {
        ProductOrder::create([
            'name'  => 'Pack Photoshop',
            'price' => 59.99,
        ]);
    }
}

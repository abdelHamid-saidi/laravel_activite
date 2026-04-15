<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubscriptionOrder;

class SubscriptionOrderSeeder extends Seeder
{
    public function run(): void
    {
        SubscriptionOrder::create([
            'name'            => 'Coaching Mensuel',
            'price'           => 29.99,
            'duration_months' => 1,
        ]);
    }
}

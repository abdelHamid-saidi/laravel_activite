<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Order;
use App\Models\ProductOrder;
use App\Models\SubscriptionOrder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'test@example.com')->first();

        $productOrder = ProductOrder::first();

        // On récupère un subscription order
        $subscriptionOrder = SubscriptionOrder::first();

        // Order lié à un ProductOrder
        Order::create([
            'user_id'        => $user->id,
            'amount'         => $productOrder->price,
            'status'         => 'paid',
            'orderable_id'   => $productOrder->id,
            'orderable_type' => ProductOrder::class,
        ]);

        // Order lié à un SubscriptionOrder
        Order::create([
            'user_id'        => $user->id,
            'amount'         => $subscriptionOrder->price,
            'status'         => 'paid',
            'orderable_id'   => $subscriptionOrder->id,
            'orderable_type' => SubscriptionOrder::class,
        ]);
    }
}

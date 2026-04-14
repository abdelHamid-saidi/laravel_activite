<?php

namespace Database\Seeders;

use App\Models\Settings;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user = User::where('email', 'test@example.com')->first();

        $user->settings()->create([
            'theme' => 'dark',
            'lang'  => 'fr',
        ]);
    }
}
$user->settings()->create(['theme' => 'dark',    'lang'  => 'en']);

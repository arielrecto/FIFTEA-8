<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Seeder;
use App\Enums\SupplyDefaultTypes;
use App\Models\Supply;
use App\Models\Type;
use Database\Seeders\RolesSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\CategoriesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategoriesSeeder::class,
            AdminSeeder::class,
            HeroContentSeeder::class,
        ]);


        collect(SupplyDefaultTypes::cases())->map(function ($type) {
            Type::create([
                'name' => $type->value
            ]);
        });

        Profile::factory(User::count())->create();
    }
}

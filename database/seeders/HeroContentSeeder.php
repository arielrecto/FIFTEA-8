<?php

namespace Database\Seeders;

use App\Models\HeroContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HeroContent::create([
            'description' => 'We offer the best milk tea in town. We have a wide variety of',
            'centerImage' => 'hero/6Aiikyw1rwshshey0o9Nvm1Ey3fGjXQENuoPg8bE.png',
            'leftImage' => 'hero/764E6fZJFc3gulHuu0g5NqKAcJNwQGycqvbrssAB.png',
            'rightImage' => 'hero/1js1CY8jv7ArpnzN4kfvRxp2Y5TGxvAtTgdIQBm9.png',
        ]);
    }
}

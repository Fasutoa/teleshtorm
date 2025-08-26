<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChannelCategory;

class ChannelCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'News',
            'Technology',
            'Business',
            'Entertainment',
            'Sports',
            'Education',
            'Health',
            'Travel',
            'Gaming',
            'Food',
        ];

        foreach ($categories as $cat) {
            ChannelCategory::factory()->create([
                'name' => $cat,
            ]);
        }
    }
}

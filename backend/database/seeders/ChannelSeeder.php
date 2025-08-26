<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Channel;
use App\Models\ChannelCategory;

class ChannelSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ChannelCategory::all();

        if ($categories->isEmpty()) {
            $this->call(ChannelCategorySeeder::class);
            $categories = ChannelCategory::all();
        }

        Channel::factory()->count(5)->make()->each(function ($channel) use ($categories) {
            $channel->category_id = $categories->random()->id;
            $channel->save();
        });
    }
}

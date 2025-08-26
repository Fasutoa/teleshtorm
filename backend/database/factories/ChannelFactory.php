<?php

namespace Database\Factories;

use App\Models\Channel;
use App\Models\ChannelCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChannelFactory extends Factory
{
    protected $model = Channel::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'description' => $this->faker->optional()->paragraph,
            'category_id' => ChannelCategory::factory(),
            'image' => $this->faker->optional()->imageUrl(640, 480, 'business'),
            'link_tg' => '@' . $this->faker->unique()->lexify('??????'),
            'hidden' => $this->faker->boolean(10), // 10% скрытые
            'activity' => $this->faker->boolean(90), // 90% активные
            'subscribers' => $this->faker->numberBetween(100, 500000),
            'created_at' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'translates' => json_encode([
                'en' => $this->faker->sentence(3),
                'ru' => $this->faker->sentence(3),
            ]),
        ];
    }
}


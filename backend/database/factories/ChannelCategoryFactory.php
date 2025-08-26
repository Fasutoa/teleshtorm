<?php

namespace Database\Factories;

use App\Models\ChannelCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ChannelCategoryFactory extends Factory
{
    protected $model = ChannelCategory::class;

    public function definition(): array
    {
        $name = ucfirst($this->faker->unique()->word);

        return [
            'name' => $name,
            'translit_name' => Str::slug($name . '-' . $this->faker->unique()->numberBetween(1, 10000)),
            'translates' => json_encode([
                'en' => $name,
                'ru' => $this->faker->word(),
            ]),
        ];
    }
}

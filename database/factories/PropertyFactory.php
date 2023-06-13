<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name"=>$this->faker->name(),
            "description"=>$this->faker->text(),
            "price"=>$this->faker->randomFloat(2, 1, 100),
            "image"=>$this->faker->imageUrl(),
            "address"=>$this->faker->address(),
            "city_id"=>City::all()->random(),
            "type_id"=>Type::all()->random(),
            "user_id"=>User::all()->random()
        ];
    }
}

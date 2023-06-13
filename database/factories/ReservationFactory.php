<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>User::all()->random(),
            'property_id'=>Property::all()->random(),
            'state'=>"waiting",
            'reservation_code'=> $this->faker->postcode()
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $array = ['inst', 'facebook', 'friend', 'website'];
        return [
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'phone' => $this->faker->phoneNumber,
            'advertising' => $array[array_rand(['inst', 'facebook', 'friend', 'website'])],
            'status_id' => rand(1,4),
            'instructor_id' => rand(1,15),
            'comment' => $this->faker->text
        ];
    }
}

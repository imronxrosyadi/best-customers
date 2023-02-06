<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fullName' => fake()->name(),
            'idNumber' => fake()->numerify('##########'),
            'dateOfBirth' => fake()->dateTimeInInterval('-25 years', '+30 days'),
            'gender' => $this->generateRandomString(1),
            'address' => fake()->address()
        ];
    }

    function generateRandomString($length = 1): string
    {
        $characters = 'LP';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, 1)];
        }
        return $randomString;
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}

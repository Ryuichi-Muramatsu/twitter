<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sample>
 */
class SampleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        return [
            // 'name' => '川島',
            // 'age' => 20,
            //追加※fakerを利用
            'name' => $this->faker->name,
            'age' => $this->faker->numberBetween(20,80)
        ];
    }
}

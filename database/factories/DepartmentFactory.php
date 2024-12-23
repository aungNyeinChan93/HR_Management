<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->randomElement(['sale','mkt','hr','it','finance','accounting','admin','operation','logistic','warehouse','production','quality','maintenance','security','safety','legal','compliance','procurement','supply chain','planning','engineering','research and development','marketing','sales','customer service','human resource'])
        ];
    }
}

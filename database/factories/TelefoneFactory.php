<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TelefoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'numero' => $this->faker->randomNumber(9),
            'descricao' => $this->faker->text(50)
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EventosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->jobTitle,
            'sala'=>$this->faker->randomDigit,
            'tipo'=>$this->faker->numberBetween($min = 0, $max = 1),
            'hora'=>$this->faker->randomDigit,
            'imagem'=>$this->faker->imageUrl($width = 640, $height = 480),
            'itens'=> $this->faker->randomElements($array= array('Música','Palco','Alimentação','Certificado'), $cout=4 ),
            'local'=> $this->faker->city,
            'data_evento'=>$this->faker->date($format = 'Y-d-m', $max = 'now'),
            'descricao'=>$this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'preço_evento'=>$this->faker->randomDigit

        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Document;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class DocumentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Document::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1,20),
            'control_id' => $this->faker->unique()->swiftBicNumber,
            'subject' => $this->faker->sentence($nbWords = 10, $variableNbWords = true),
            'type' => $this->faker->randomElement($array = array ('Memorandum','Special Order','Invitation'), $count = 1),
            'classification' => $this->faker->randomElement($array = array ('simple','complex','h-technical'), $count = 1),
            'sender' => $this->faker->lastName
        ];
    }
}

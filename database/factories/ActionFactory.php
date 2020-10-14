<?php

namespace Database\Factories;

use App\Models\Action;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class ActionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Action::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'document_id' => $this->faker->unique()->numberBetween(1,50),
            'user_id' => $this->faker->numberBetween(1,20),
            'office_id' => $this->faker->numberBetween(1,20),
            'action_office' => $this->faker->numberBetween(1,20),
            'action_desired' => $this->faker->randomElement($array = array ('Information & Record','Strict Compliance','Immediate Appropriate Action'), $count = 1),
            'is_division' => $this->faker->boolean
        ];
    }
}

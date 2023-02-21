<?php

namespace Database\Factories;

use App\Models\Selection;
use Illuminate\Database\Eloquent\Factories\Factory;

class SelectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Selection::class;

    public function definition()
    {
        return [
            'code'=>$this->faker->randomNumber(5, false),
            'value'=>$this->faker->word,
            'category'=>$this->faker->word,
            'particulars'=>$this->faker->word,
        ];
    }
}

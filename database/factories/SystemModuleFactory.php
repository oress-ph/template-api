<?php

namespace Database\Factories;

use App\Models\SystemModule;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

class SystemModuleFactory extends Factory
{
    protected $model = SystemModule::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'system_module'=> $this->faker->word,
            'description'=>$this->faker->word,
        ];
        
    }
}

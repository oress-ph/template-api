<?php

namespace Database\Factories;

use App\Models\UserRight;
use App\Models\User;
use App\Models\SystemModule;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserRightFactory extends Factory
{
    protected $model = UserRight::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=> User::factory(),
            'system_module_id'=> SystemModule::factory(),
            'can_add'=>1,
            'can_save'=>1,
            'can_edit'=>1,
            'can_delete'=>1,
            'can_print'=>1,
            'can_lock'=>1,
            'can_unlock'=>1,
        ];
    }
}

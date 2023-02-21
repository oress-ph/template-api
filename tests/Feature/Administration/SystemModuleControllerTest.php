<?php

namespace Tests\Feature\Administration;

use App\Models\SystemModule;
use App\Models\User;
use App\Models\UserRight;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SystemModuleControllerTest extends TestCase
{
    use RefreshDatabase,WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function it_should_get_list_of_system_moduless()
    {

        $user = User::factory(1)->create();
        $system_module = SystemModule::factory()->create();

        $system_module = SystemModule::factory()->create(
            [
                'system_module'=> 'Administration - Modules',
                'description'=> 'Administration - Modules',
            ]
        );

        UserRight::factory()->create(
            [
                'user_id'=> $user->first()->id,
                'system_module_id'=> $system_module->id,
                'can_add'=>1,
                'can_save'=>1,
                'can_edit'=>1,
                'can_delete'=>1,
                'can_print'=>1,
                'can_lock'=>1,
                'can_unlock'=>1,
            ]
        );

        $this->actingAs($user->first())
        ->json(
            'GET',
            'api/system_modules'
        )
        ->assertOk()
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'system_module',
                    'description',
                ],
            ]
        ]);
    }

    /** @test */
    public function it_should_get_single_system_modules(){

        $user = User::factory(1)->create();
        $system_module = SystemModule::factory()->create();
        $system_module = SystemModule::factory()->create(
            [
                'system_module'=> 'Administration - Modules',
                'description'=> 'Administration - Modules',
            ]
        );

        UserRight::factory()->create(
            [
                'user_id'=> $user->first()->id,
                'system_module_id'=> $system_module->id,
                'can_add'=>1,
                'can_save'=>1,
                'can_edit'=>1,
                'can_delete'=>1,
                'can_print'=>1,
                'can_lock'=>1,
                'can_unlock'=>1,
            ]
        );

        $this->actingAs($user->first())
        ->json(
            'get',
            "api/system_modules/$system_module->id"
        )
        ->assertOk()
        ->assertJsonStructure([
            'data' => [
                'id',
                'system_module',
                'description',
            ]
        ]);
    }

    /** @test */
    public function it_should_add_system_modules()
    {
        $user = User::factory(1)->create();
        $system_module = SystemModule::factory()->make();
        $system_module = SystemModule::factory()->create(
            [
                'system_module'=> 'Administration - Modules',
                'description'=> 'Administration - Modules',
            ]
        );
        UserRight::factory()->create(
            [
                'user_id'=> $user->first()->id,
                'system_module_id'=> $system_module->id,
                'can_add'=>1,
                'can_save'=>1,
                'can_edit'=>1,
                'can_delete'=>1,
                'can_print'=>1,
                'can_lock'=>1,
                'can_unlock'=>1,
            ]
        );


        $this->actingAs($user->first(), 'api')
        ->json(
            'POST',
            'api/system_modules',
            $system_module->toArray()
        )
        ->assertCreated()
        ->assertJsonStructure([
            'data'=>[
                'id',
                'system_module',
                'description',
            ]
        ]);
    }

    /** @test */
    public function it_should_update_of_system_modules(){

        $user = User::factory(1)->create();
        $system_module = SystemModule::factory()->create();
        $payload = SystemModule::factory()->make();


        $system_module = SystemModule::factory()->create(
            [
                'system_module'=> 'Administration - Modules',
                'description'=> 'Administration - Modules',
            ]
        );

        UserRight::factory()->create(
            [
                'user_id'=> $user->first()->id,
                'system_module_id'=> $system_module->id,
                'can_add'=>1,
                'can_save'=>1,
                'can_edit'=>1,
                'can_delete'=>1,
                'can_print'=>1,
                'can_lock'=>1,
                'can_unlock'=>1,
            ]
        );

        $this->actingAs($user->first())
        ->json(
            'PUT',
            'api/system_modules/'.$system_module->id,
            $payload->toArray()
        )
        ->assertOk()
        ->assertJsonStructure([
            'data' => [
                'id',
                'system_module',
                'description',
            ]
        ]);
    }

    /** @test */
    public function it_should_soft_delete_of_system_modules()
    {

        $user = User::factory(1)->create();
        $data = SystemModule::factory()->create();


        $system_module = SystemModule::factory()->create(
            [
                'system_module' => 'Administration - Modules',
                'description' => 'Administration - Modules',
            ]
        );

        UserRight::factory()->create(
            [
                'user_id' => $user->first()->id,
                'system_module_id' => $system_module->id,
                'can_add' => 1,
                'can_save' => 1,
                'can_edit' => 1,
                'can_delete' => 1,
                'can_print' => 1,
                'can_lock' => 1,
                'can_unlock' => 1,
            ]
        );

        $this->actingAs($user->first())
            ->json(
                'delete',
                'api/system_modules/' . $data->id
            )
            ->assertNoContent();
        $this->assertSoftDeleted('system_modules', ['id' => $data->id]);
    }
    //Unauthorized

    /** @test */
    public function it_should_unauthorized_to_get_list_of_system_moduless()
    {

        $user = User::factory(1)->create();
        $system_module = SystemModule::factory()->create();


        $this->actingAs($user->first())
        ->json(
            'GET',
            'api/system_modules'
        )
        ->assertUnauthorized();
    }

    /** @test */
    public function it_should_unauthorized_to_get_single_system_modules(){

        $user = User::factory(1)->create();
        $system_module = SystemModule::factory()->create();

        $this->actingAs($user->first())
        ->json(
            'get',
            "api/system_modules/$system_module->id"
        )
        ->assertUnauthorized();
    }

    /** @test */
    public function it_unauthorized_to_should_add_system_modules()
    {
        $user = User::factory(1)->create();
        $system_module = SystemModule::factory()->make();


        $this->actingAs($user->first(), 'api')
        ->json(
            'POST',
            'api/system_modules',
            $system_module->toArray()
        )
        ->assertUnauthorized();
    }

    /** @test */
    public function it_should_unauthorized_to_update_of_system_modules(){

        $user = User::factory(1)->create();
        $system_module = SystemModule::factory()->create();
        $payload = SystemModule::factory()->make();

        $this->actingAs($user->first())
        ->json(
            'PUT',
            'api/system_modules/'.$system_module->id,
            $payload->toArray()
        )
        ->assertUnauthorized();
    }

    /** @test */
    public function it_should_unauthorized_to_soft_delete_of_system_modules()
    {

        $user = User::factory(1)->create();
        $data = SystemModule::factory()->create();


        $this->actingAs($user->first())
            ->json(
                'delete',
                'api/system_modules/' . $data->id
            )
            ->assertUnauthorized();
    }

    /** @test */
    public function it_should_get_system_modules_dropdown()
    {
        $user = User::factory(1)->create();

        $this->actingAs($user->first())
        ->json(
            'get',
            'api/system_modules/by-dropdown-list'
        )
        ->assertOk()
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'system_module',
                    'description',
                ],
            ]
        ]);
    }
}

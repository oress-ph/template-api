<?php

namespace Tests\Feature\Administration;

use App\Models\UserRight;
use App\Models\User;
use App\Models\SystemModule;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRightControllerTest extends TestCase
{
    use RefreshDatabase,WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function it_should_get_list_of_user_rights()
    {
        
        $user = User::factory(1)->create();
        $user_right = UserRight::factory()->create();

        $system_module = SystemModule::factory()->create(
            [            
                'system_module'=> 'Administration - User Detail',
                'description'=> 'Administration - User Detail',
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
            'api/user_rights'
        )
        ->assertOk()
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',        
                    'user_id',
                    'system_module_id',
                    'can_add',
                    'can_save',
                    'can_edit',
                    'can_delete',
                    'can_print',
                    'can_lock',
                    'can_unlock',
                ],
            ]
        ]);
    }
    /** @test */
    public function it_should_get_single_user_right(){

        $user = User::factory(1)->create();
        $user_right = Userright::factory()->create();
        $system_module = SystemModule::factory()->create(
            [            
                'system_module'=> 'Administration - User Detail',
                'description'=> 'Administration - User Detail',
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
            "api/user_rights/$user_right->id"
        )
        ->assertOk()
        ->assertJsonStructure([
            'data' => [
                'id',        
                'user_id',
                'system_module_id',
                'can_add',
                'can_save',
                'can_edit',
                'can_delete',
                'can_print',
                'can_lock',
                'can_unlock',
            ]
        ]);
    }
    /** @test */
    public function it_should_add_user_right()
    {
        $user = User::factory(1)->create();
        $user_right = Userright::factory()->make();
        $system_module = SystemModule::factory()->create(
            [            
                'system_module'=> 'Administration - User Detail',
                'description'=> 'Administration - User Detail',
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
            'api/user_rights',
            $user_right->toArray()
        )
        ->assertCreated()
        ->assertJsonStructure([
            'data'=>[
                'id',        
                'user_id',
                'system_module_id',
                'can_add',
                'can_save',
                'can_edit',
                'can_delete',
                'can_print',
                'can_lock',
                'can_unlock',
            ]
        ]);
    }
    /** @test */
    public function it_should_update_of_user_right(){

        $user = User::factory(1)->create();
        $user_right = UserRight::factory()->create();
        $payload = UserRight::factory()->make();


        $system_module = SystemModule::factory()->create(
            [
                'system_module'=> 'Administration - User Detail',
                'description'=> 'Administration - User Detail',
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
            'api/user_rights/'.$user_right->id,
            $payload->toArray()
        )
        ->assertOk()
        ->assertJsonStructure([
            'data' => [
                'id',
                'user_id',
                'system_module_id',
                'can_add',
                'can_save',
                'can_edit',
                'can_delete',
                'can_print',
                'can_lock',
                'can_unlock',
            ]
        ]);
    }
    /** @test */
    public function it_should_get_list_of_user_rights_by_user_id()
    {
        $user = User::factory(1)->create();
        $data = User::factory()->create();
        $user_right = UserRight::factory()->create(
            [
                'user_id'=> $data->id
            ]
        );

        $system_module = SystemModule::factory()->create(
            [            
                'system_module'=> 'Administration - User Detail',
                'description'=> 'Administration - User Detail',
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
            'api/user_rights/by-user/'.$data->id
        )
        ->assertOk()
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'user_id',
                    'system_module_id',
                    'can_add',
                    'can_save',
                    'can_edit',
                    'can_delete',
                    'can_print',
                    'can_lock',
                    'can_unlock',
                ],
            ]
        ]);
    }

    /** @test */
    public function it_should_get_list_of_user_rights_by_user_login()
    {
        $user = User::factory(1)->create();

        $system_module = SystemModule::factory()->create(
            [            
                'system_module'=> 'Administration - User Detail',
                'description'=> 'Administration - User Detail',
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
            'api/user-rights/by-login-user'
        )
        ->assertOk()
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'user_id',
                    'system_module_id',
                    'can_add',
                    'can_save',
                    'can_edit',
                    'can_delete',
                    'can_print',
                    'can_lock',
                    'can_unlock',
                ],
            ]
        ]);
    }
    /** @test */
    public function it_should_copy_of_user_right(){

        $user = User::factory(1)->create();
        $user2 = User::factory(1)->create();
        $payload = ['from_user_id'=>$user->first()->id];


        $system_module = SystemModule::factory()->create(
            [
                'system_module'=> 'Administration - User Detail',
                'description'=> 'Administration - User Detail',
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
            'POST',
            'api/user_rights/copy_user_rights/'.$user2->first()->id,
            $payload
        )
        ->assertOk();
    }

    //Unauthorized
    /** @test */
    public function it_should_unauthorized_to_get_list_of_user_rights()
    {
        
        $user = User::factory(1)->create();
        $user_right = UserRight::factory()->create();


        $this->actingAs($user->first())
        ->json(            
            'GET',
            'api/user_rights'
        )
        ->assertUnauthorized();
    }
    /** @test */
    public function it_should_unauthorized_to_get_single_user_right(){

        $user = User::factory(1)->create();
        $user_right = Userright::factory()->create();

        $this->actingAs($user->first())
        ->json(            
            'get',
            "api/user_rights/$user_right->id"
        )
        ->assertUnauthorized();
    }
    /** @test */
    public function it_should_unauthorized_to_add_user_right()
    {
        $user = User::factory(1)->create();
        $user_right = Userright::factory()->make();



        $this->actingAs($user->first(), 'api')
        ->json(
            'POST',
            'api/user_rights',
            $user_right->toArray()
        )
        ->assertUnauthorized();
    }
    /** @test */
    public function it_should_unauthorized_to_update_of_user_right(){

        $user = User::factory(1)->create();
        $user_right = UserRight::factory()->create();
        $payload = UserRight::factory()->make();

        $this->actingAs($user->first())
        ->json(
            'PUT',
            'api/user_rights/'.$user_right->id,
            $payload->toArray()
        )
        ->assertUnauthorized();
    }
    /** @test */
    public function it_should_unauthorized_to_get_list_of_user_rights_by_user_id()
    {
        $user = User::factory(1)->create();
        $data = User::factory()->create();
        $user_right = UserRight::factory()->create(
            [
                'user_id'=> $data->id
            ]
        );




        $this->actingAs($user->first())
        ->json(            
            'GET',
            'api/user_rights/by-user/'.$data->id
        )
        ->assertUnauthorized();
    }
}

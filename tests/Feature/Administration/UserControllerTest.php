<?php

namespace Tests\Feature\Administration;

use App\Models\User;
use App\Models\UserRight;
use App\Models\SystemModule;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase,WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function it_should_get_list_of_users()
    {
        
        $user = User::factory(1)->create();

        $system_module = SystemModule::factory()->create(
            [            
                'system_module'=> 'Administration - Users',
                'description'=> 'Administration - Users',
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
            'api/users'
        )
        ->assertOk()
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',        
                    'username',
                    'name',
                    'email',
                    'user_type',
                    'warehouse_id',
                    'is_active',
                    'password',
                    'is_active',
                ],
            ]
        ]);
    }
    /** @test */
    public function it_should_get_single_user(){

        $user = User::factory(1)->create();
        $payload = User::factory()->create();
        $system_module = SystemModule::factory()->create(
            [            
                'system_module'=> 'Administration - Users',
                'description'=> 'Administration - Users',
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
            "api/users/$payload->id"
        )
        ->assertOk()
        ->assertJsonStructure([
            'data' => [
                'id',        
                'username',
                'name',
                'email',
                'user_type',
                'warehouse_id',
                'is_active',
                'password',
                'is_active',
            ]
        ]);
    }
    /** @test */
    public function it_should_get_users_by_user_type()
    {
        $user = User::factory(1)->create();
        $data = User::factory()->create(            [
            'user_type'=> 'Admin'
        ]);
        $payload = ['Admin','Receiving Staff'];
        $system_module = SystemModule::factory()->create(
            [            
                'system_module'=> 'Administration - Users',
                'description'=> 'Administration - Users',
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
            'api/users/get_users_by_user_type',
            $payload
        )
        ->assertOk();
       
    }
    /** @test */
    public function it_should_get_list_of_active_users()
    {
        
        $user = User::factory(1)->create(
            [
                'is_active'=>1
            ]
        );
        $data = User::factory()->create(
            ['is_active'=>1]
        );

        UserRight::factory()->create(
            [
                'user_id'=>$data->id
            ]
        );

        $this->actingAs($user->first())
        ->json(            
            'get',
            'api/get-all-users-active'
        )
        ->assertOk()
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',        
                    'username',
                    'name',
                    'email',
                    'user_type',
                    'warehouse_id',
                    'is_active',
                    'password',
                    'is_active',
                ],
            ]
        ]);
    }

    /** @test */
    public function it_should_update_user_password(){

        $user = User::factory(1)->create();
        $data = User::factory()->create();
        $payload = ['new_password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'];
        $system_module = SystemModule::factory()->create(
            [            
                'system_module'=> 'Administration - Users',
                'description'=> 'Administration - Users',
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
            'api/change-password/'.$data->id,
            $payload
        )
        ->assertOk()
        ->assertJsonStructure([
            'data' => [
                'id',
                'username',
                'name',
                'email',
                'user_type',
                'warehouse_id',
                'is_active',
                'password',
                'is_active',
            ]
        ]);
    }
    //Unauthorized
    /** @test */
    public function it_should_unauthorized_to_get_list_of_users()
    {
        
        $user = User::factory(1)->create();

        $this->actingAs($user->first())
        ->json(            
            'GET',
            'api/users'
        )
        ->assertUnauthorized();
    }
    /** @test */
    public function it_should_unauthorized_to_get_single_user(){

        $user = User::factory(1)->create();
        $payload = User::factory()->create();

        $this->actingAs($user->first())
        ->json(            
            'get',
            "api/users/$payload->id"
        )
        ->assertUnauthorized();
    }
    /** @test */
    public function it_should_unauthorized_to_get_users_by_user_type()
    {
        $user = User::factory(1)->create();
        $data = User::factory()->create(            [
            'user_type'=> 'Admin'
        ]);
        $payload = ['Admin','Receiving Staff'];


        $this->actingAs($user->first(), 'api')
        ->json(
            'POST',
            'api/users/get_users_by_user_type',
            $payload
        )
        ->assertUnauthorized();
       
    }

}

<?php

namespace Tests\Feature\Administration;

use App\Models\User;
use App\Models\UserRight;
use App\Models\SystemModule;
use App\Models\Selection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SelectionControllerTest extends TestCase
{
    use RefreshDatabase,WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
       /** @test */
       public function it_should_get_list_of_selection()
       {

           $user = User::factory(1)->create();
           $selection = Selection::factory()->create();

           $system_module = SystemModule::factory()->create(
               [
                   'system_module'=> 'Administration - Selections',
                   'description'=> 'Administration - Selections',
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
               'api/selections'
           )
           ->assertOk()
           ->assertJsonStructure([
               'data' => [
                   '*' => [
                       'id',
                       'code',
                       'value',
                       'category',
                       'particulars',
                   ],
               ]
           ]);
       }

       /** @test */
       public function it_should_get_single_selection()
       {

           $user = User::factory(1)->create();
           $selection = Selection::factory()->create();
           $system_module = SystemModule::factory()->create(
               [
                   'system_module' => 'Administration - Selections',
                   'description' => 'Administration - Selections',
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
                   'get',
                   'api/selections/'.$selection->id
               )
               ->assertOk()
               ->assertJsonStructure([
                   'data' => [
                       'id',
                       'code',
                       'value',
                       'category',
                       'particulars',
                   ]
               ]);
       }
       /** @test */
       public function it_should_add_selection()
       {
           $user = User::factory(1)->create();
           $selection = Selection::factory()->make();
           $system_module = SystemModule::factory()->create(
               [
                   'system_module'=> 'Administration - Selections',
                   'description'=> 'Administration - Selections',
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
               'api/selections',
               $selection->toArray()
           )
           ->assertCreated()
           ->assertJsonStructure([
               'data'=>[
                   'id',
                   'code',
                   'value',
                   'category',
                   'particulars',
               ]
           ]);
       }

       /** @test */
       public function it_should_update_of_selection(){

           $user = User::factory(1)->create();
           $selection = Selection::factory()->create();
           $payload = Selection::factory()->make();


           $system_module = SystemModule::factory()->create(
               [
                   'system_module'=> 'Administration - Selections',
                   'description'=> 'Administration - Selections',
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
               'api/selections/'.$selection->id,
               $payload->toArray()
           )
           ->assertOk()
           ->assertJsonStructure([
               'data' => [
                   'id',
                   'code',
                   'value',
                   'category',
                   'particulars',
               ]
           ]);
       }

       /** @test */
       public function it_should_soft_delete_of_selection()
       {

           $user = User::factory(1)->create();
           $selection = Selection::factory()->create();


           $system_module = SystemModule::factory()->create(
               [
                   'system_module' => 'Administration - Selections',
                   'description' => 'Administration - Selections',
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
                   'api/selections/' . $selection->id
               )
               ->assertNoContent();
           $this->assertSoftDeleted('selections', ['id' => $selection->id]);
       }

       //Unauthorized
       /** @test */
       public function it_should_unauthorized_to_get_list_of_selection()
       {

           $user = User::factory(1)->create();
           $selection = Selection::factory()->create();


           $this->actingAs($user->first())
           ->json(
               'GET',
               'api/selections'
           )
           ->assertUnauthorized();
       }

       /** @test */
       public function it_should_unauthorized_to_get_single_selection()
       {

           $user = User::factory(1)->create();
           $selection = Selection::factory()->create();

           $this->actingAs($user->first())
               ->json(
                   'get',
                   'api/selections/'.$selection->id
               )
               ->assertUnauthorized();
       }
       /** @test */
       public function it_should_unauthorized_to_add_selection()
       {
           $user = User::factory(1)->create();
           $selection = Selection::factory()->make();


           $this->actingAs($user->first(), 'api')
           ->json(
               'POST',
               'api/selections',
               $selection->toArray()
           )
           ->assertUnauthorized();
       }

       /** @test */
       public function it_should_unauthorized_to_update_of_selection(){

           $user = User::factory(1)->create();
           $selection = Selection::factory()->create();
           $payload = Selection::factory()->make();

           $this->actingAs($user->first())
           ->json(
               'PUT',
               'api/selections/'.$selection->id,
               $payload->toArray()
           )
           ->assertUnauthorized();
       }

       /** @test */
       public function it_should_unauthorized_to_soft_delete_of_selection()
       {

           $user = User::factory(1)->create();
           $selection = Selection::factory()->create();

           $this->actingAs($user->first())
               ->json(
                   'delete',
                   'api/selections/' . $selection->id
               )
               ->assertUnauthorized();
       }

    /** @test */
    public function it_should_get_list_of_selection_by_category()
    {

        $user = User::factory(1)->create();

        $this->actingAs($user->first())
        ->json(
            'GET',
            'api/selections/by-category'
        )
        ->assertOk()
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'code',
                    'value',
                    'category',
                    'particulars',
                ],
            ]
        ]);
    }
}

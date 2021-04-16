<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_unauthorized_user_cannot_create_categories(){

        $response = $this->post(route('categories.store'),[
            'name' => 'Bosch'
        ]);

        $response->assertRedirect(route('login'));
    }

    /** @test */
    public function an_unauthorized_user_cannot_screen_categories()
    {
        $response = $this->get(route('categories.index'));

        $response->assertRedirect(route('login'));

    }
    /** @test */
    public function an_unauthorized_user_cannot_edit_categories()
    {
        $category = Category::factory()->create();

        $response = $this->get(route('categories.edit', $category->id ));

        $response->assertRedirect(route('login'));

    }
    /** @test */
    public function an_unauthorized_user_cannot_delete_categories()
    {
        $category = Category::factory()->create();

        $response = $this->delete(route('categories.destroy', $category->id ));

        $response->assertRedirect(route('login'));
    }
     /** @test */
    public function an_authenticated_user_can_create_categories()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post(route('categories.store'),[
            'name' => 'Bosch'
        ]);

        $response->assertRedirect(route('categories.index'));

        $this->assertDatabaseHas('categories',[
            'name' => 'Bosch'
        ]);
    }
    /** @test */
    public function an_authenticated_user_can_screen_categories(){

        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get(route('categories.index'));

        $response->assertStatus(200);

    }
   /** @test */
    public function an_authenticated_user_can_delete_categories()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $category = Category::factory()->create();

        $response = $this->delete(route('categories.destroy', $category->id ));

        $response->assertRedirect(route('categories.index'));

    }
    /** @test */
    public function a_category_requires_a_name()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post(route('categories.store'),[
            'name' => null
        ]);

        $response->assertSessionHasErrors('name');
    }
}

<?php

namespace Tests\Feature;

use App\Models\BranchOffice;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    private function generateCategoryPermission($array)
    {
        Permission::create(['name' => 'categorias.index', 'description' => 'Ver lista de categorias'])
        ->syncRoles($array);
        Permission::create(['name' => 'categorias.edit', 'description' => 'Editar categorias'])
        ->syncRoles($array);
        Permission::create(['name' => 'categorias.destroy', 'description' => 'Eliminar categorias'])
        ->syncRoles($array);
        Permission::create(['name' => 'categorias.create', 'description' =>  'Crear categorias'])
        ->syncRoles($array);

    }
    private function generateRolAdmin()
    {
        return Role::create([
            'name' => 'Admin',
            'description' => 'Administrador de la empresa'
        ]);
    }
    private function assignAdminPermisionCategory()
    {
        $admin = $this->generateRolAdmin();

        $array = array($admin);

        $this->generateCategoryPermission($array);
    }
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
        $branchOffice = BranchOffice::factory()->create();

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
    public function an_authenticated_user_with_rol_admin_can_screen_categories(){

        $this->withoutExceptionHandling();
        $branchOffice = BranchOffice::factory()->create();
        $user = User::factory()->create();

        $this->assignAdminPermisionCategory();

        $user->assignRole('Admin');

        $this->actingAs($user);

        $response = $this->get(route('categories.index'));

        $response->assertStatus(200);

    }
   /** @test */
    public function an_authenticated_user_with_rol_admin_can_delete_categories()
    {
        $branchOffice = BranchOffice::factory()->create();
        $user = User::factory()->create();

        $this->assignAdminPermisionCategory();

        $user->assignRole('Admin');

        $this->actingAs($user);

        $category = Category::factory()->create();

        $response = $this->delete(route('categories.destroy', $category->id ));

        $response->assertRedirect(route('categories.index'));

    }
    /** @test */
    public function a_category_requires_a_name()
    {
        $branchOffice = BranchOffice::factory()->create();
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post(route('categories.store'),[
            'name' => null
        ]);

        $response->assertSessionHasErrors('name');
    }
}

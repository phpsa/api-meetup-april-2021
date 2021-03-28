<?php

use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Role;

class CreateCategoriesTable extends Migration
{


    protected $permissions = [
            'blog-category-create',
            'blog-category-update',
            'blog-category-delete',
            'blog-category-restore'
        ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->softDeletes();
        });

        $this->addCategoryPermissions();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
        $this->removeCategoryPermissions();
    }

    public function addCategoryPermissions()
    {

        $adminRole = Role::where('name','Admin')->first();
        foreach ($this->permissions as $permission) {
            $rule = Permission::create(['name' => $permission]);
            $adminRole->givePermissionTo($rule);
        }

    }

    public function removeCategoryPermissions()
    {
        Permission::whereIn('name', $this->permissions)->delete();
    }
}

<?php

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{

     protected $permissions = [
            'blog-tag-create',
            'blog-tag-update',
            'blog-tag-delete',
            'blog-tag-restore'
        ];
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('tag');
            $table->timestamps();
        });

        $this->addTagPermissions();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
        $this->removeTagPermissions();
    }

      public function addTagPermissions()
    {


        $adminRole = Role::where('name','Admin')->first();


        foreach ($this->permissions as $permission) {
            $rule = Permission::create(['name' => $permission]);
            $adminRole->givePermissionTo($rule);
        }

        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
    }

    public function removeTagPermissions()
    {

        Permission::whereIn('name', $this->permissions)->delete();
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
    }
}

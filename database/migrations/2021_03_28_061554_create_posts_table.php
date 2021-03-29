<?php

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{

        protected $permissions = [
            'blog-post-create',
            'blog-post-update',
            'blog-post-delete',
            'blog-post-restore'
        ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image')->nullable();
            $table->text('description');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('category_id')->nullable()->constrained('categories');

            $table->timestamps();
            $table->timestamp('published_at')->nullable();
            $table->softDeletes();
        });

         $this->addPostPermissions();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');

         $this->removePostPermissions();
    }


     public function addPostPermissions()
    {


        $adminRole = Role::where('name','Admin')->first();


        foreach ($this->permissions as $permission) {
            $rule = Permission::create(['name' => $permission]);
            $adminRole->givePermissionTo($rule);
        }

        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
    }

    public function removePostPermissions()
    {

        Permission::whereIn('name', $this->permissions)->delete();
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessControlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->down();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        Schema::enableForeignKeyConstraints();

        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('label', 200);
            $table->tinyInteger('active')->default(1);
            $table->timestampsTz();
            $table->softDeletesTz();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('login')->unique();
            $table->string('password');
            $table->unsignedInteger('profile_id')->default(4);
            $table->tinyInteger('active')->default(1);
            $table->timestampsTz();
            $table->softDeletesTz();
        });

        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('label', 200);
            $table->tinyInteger('active')->default(1);
            $table->timestampsTz();
            $table->softDeletesTz();
        });

        Schema::create('group_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('group_id');
            $table->foreign('group_id')->references('id')->on('groups');
            $table->unsignedInteger('profile_id');
            $table->foreign('profile_id')->references('id')->on('profiles');
            $table->timestampsTz();
            $table->softDeletesTz();
        });

        Schema::create('methods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('label', 200);
            $table->string('url', 200);
            $table->tinyInteger('active')->default(1);
            $table->timestampsTz();
            $table->softDeletesTz();
        });

        Schema::create('modules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('label', 200);
            $table->string('url', 200);
            $table->unsignedInteger('method_id');
            $table->foreign('method_id')->references('id')->on('methods');
            $table->tinyInteger('active')->default(1);
            $table->timestampsTz();
            $table->softDeletesTz();
        });

        Schema::create('group_module', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('group_id');
            $table->foreign('group_id')->references('id')->on('groups');
            $table->unsignedInteger('module_id');
            $table->foreign('module_id')->references('id')->on('modules');
            $table->timestampsTz();
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
        Schema::dropIfExists('users');
        Schema::dropIfExists('groups');
        Schema::dropIfExists('group_profile');
        Schema::dropIfExists('methods');
        Schema::dropIfExists('modules');
        Schema::dropIfExists('group_module');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
  public function up()
  {
    Schema::create('permissions', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name', 50)->unique();
      $table->string('slug', 50)->unique();
    });

    Schema::create('role_permission', function (Blueprint $table) {
      $table->unsignedInteger('role_id');
      $table->unsignedInteger('permission_id');
      $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
      $table->foreign('permission_id')->references('id')->on('permissions');
    });
  }

  public function down()
  {
    Schema::dropIfExists('role_permission');
    Schema::dropIfExists('permissions');
  }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationsTable extends Migration
{
  public function up()
  {
    Schema::create('educations', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name', 50)->unique();
      $table->string('slug', 50)->unique();
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('educations');
  }
}

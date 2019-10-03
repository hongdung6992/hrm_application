<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDecisionTypesTable extends Migration
{
  public function up()
  {
    Schema::create('decision_types', function (Blueprint $table) {
      $table->increments('id')->autoIncrement();
      $table->string('name', 50)->unique();
      $table->string('slug', 50)->unique();
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('decision_types');
  }
}

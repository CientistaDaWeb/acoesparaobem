<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVolunteersSeparationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('volunteers_separations', function (Blueprint $table) {
      $table->increments('id');
      $table->timestamps();
      $table->softDeletes();
      $table->unsignedInteger('volunteer_id');
      $table->unsignedInteger('separation_id');

      $table->foreign('volunteer_id')
        ->references('id')
        ->on('volunteers')
        ->onDelete('cascade');

      $table->foreign('separation_id')
        ->references('id')
        ->on('separations')
        ->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('volunteers_separations');
  }
}

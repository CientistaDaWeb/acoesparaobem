<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionPointsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('collection_points', function (Blueprint $table) {
      $table->increments('id');
      $table->timestamps();
      $table->softDeletes();
      $table->unsignedInteger('user_id');
      $table->unsignedInteger('volunteer_id');
      $table->string('name');
      $table->string('address');
      $table->string('geoposition');
      $table->string('photo');

      $table->foreign('volunteer_id')
        ->references('id')
        ->on('volunteers')
        ->onDelete('cascade');

      $table->foreign('user_id')
        ->references('id')
        ->on('users')
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
    Schema::dropIfExists('collection_points');
  }
}

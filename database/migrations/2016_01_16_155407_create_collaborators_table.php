<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollaboratorsTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('collaborator', function(Blueprint $table) {

      $table->increments('id');
      $table->string('full_name')->index();
      $table->string('post')->index();
      $table->integer('salary')->index();
      $table->string('photo')->index();
      $table->integer('parent_id')->nullable()->index();
      $table->integer('lft')->nullable()->index();
      $table->integer('rgt')->nullable()->index();
      $table->integer('depth')->nullable()->index();
      $table->timestamp('create_at')->index();

    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop('collaborator');
  }

}

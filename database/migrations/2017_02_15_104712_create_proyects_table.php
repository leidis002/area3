<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->date('start');
            $table->date('ending');
            $table->enum('status', ['planning', 'development', 'implementation', 'finalized']);
            $table->decimal('cost', 10, 2);
            $table->enum('coin', ['EUR', 'USD', 'VEF']);
            $table->enum('type', ['web', 'system']);
            $table->integer('user_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('proyects');
    }
}

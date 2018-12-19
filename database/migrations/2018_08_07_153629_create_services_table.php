<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('icon');
            $table->string('h1')->unique();
            $table->string('slug');
            $table->string('description');
            $table->string('image');
            $table->string('content', 10000);
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}

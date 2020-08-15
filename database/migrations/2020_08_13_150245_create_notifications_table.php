<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('profile_id');
            $table->text('content');
            $table->text('type');
            $table->text('link')->nullable(true);
            $table->unsignedBigInteger('from_profile_id')->nullable(true);
            $table->foreign('profile_id')->references('id')->on('profiles');
            $table->foreign('from_profile_id')->references('id')->on('profiles');
            $table->boolean('seen')->default(false);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}

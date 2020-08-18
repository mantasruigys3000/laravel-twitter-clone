<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableFix extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Add profile features to the user table
        Schema::table('users',function (Blueprint $table){
            $table->string('bio')->nullable();
            $table->unsignedBigInteger('profile_picture');
            $table->foreign('profile_picture')->references('id')->on('files');
            $table->string('username')->unique(true);

        });

        //Remove profile keys
        Schema::table('follows',function (Blueprint $table){
            $table->dropForeign('follows_profile_id_foreign');
            $table->dropForeign('follows_follow_id_foreign');

            $table->dropColumn('follow_id');
            $table->dropColumn('profile_id');

        });
        // add user keys
        Schema::table('follows',function (Blueprint $table){

            $table->unsignedBigInteger('follow_id');
            $table->unsignedBigInteger('user_id');


            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('follow_id')->references('id')->on('users');

        });
        //remove profile from likes
        Schema::table('likes',function (Blueprint $table){

            $table->dropForeign('likes_profile_id_foreign');
            $table->dropColumn('profile_id');

        });

        // add user keys to likes
        Schema::table('likes',function (Blueprint $table){
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('users',function (Blueprint $table){
            $table->dropColumn('bio');
            $table->dropForeign('users_profile_picture_foreign');
            //$table->dropColumn('profile_picture');
            $table->dropColumn('username');


        });

        Schema::table('follows',function(Blueprint $table){
            $table->dropForeign('follows_user_id_foreign');
            $table->dropForeign('follows_follow_id_foreign');

            $table->dropColumn('follow_id');
            $table->dropColumn('user_id');
        });

        Schema::table('likes',function(Blueprint $table){
            $table->dropForeign('likes_user_id_foreign');
            $table->dropColumn('user_id');
        });


    }
}

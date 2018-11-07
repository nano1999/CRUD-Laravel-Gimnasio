<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ActivitieUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activitie_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('activitie_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->boolean('type');
            $table->boolean('control');
            $table->date('realized_pay');
            $table->date('future_pay');
            $table->timestamps();  

            $table->foreign('activitie_id')->references('id')->on('activities');

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
    }
}

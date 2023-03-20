<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDynamicsNavOjbectIdsTable extends Migration
{
    public function up()
    {
        Schema::create('dynamics_nav_ojbect_ids', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('object');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDynamicsNavObjectTypeIssuePivotTable extends Migration
{
    public function up()
    {
        Schema::create('dynamics_nav_object_type_issue', function (Blueprint $table) {
            $table->unsignedBigInteger('issue_id');
            $table->foreign('issue_id', 'issue_id_fk_8212328')->references('id')->on('issues')->onDelete('cascade');
            $table->unsignedBigInteger('dynamics_nav_object_type_id');
            $table->foreign('dynamics_nav_object_type_id', 'dynamics_nav_object_type_id_fk_8212328')->references('id')->on('dynamics_nav_object_types')->onDelete('cascade');
        });
    }
}

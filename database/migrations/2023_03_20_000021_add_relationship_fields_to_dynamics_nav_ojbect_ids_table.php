<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDynamicsNavOjbectIdsTable extends Migration
{
    public function up()
    {
        Schema::table('dynamics_nav_ojbect_ids', function (Blueprint $table) {
            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id', 'type_fk_8200562')->references('id')->on('dynamics_nav_object_types');
        });
    }
}

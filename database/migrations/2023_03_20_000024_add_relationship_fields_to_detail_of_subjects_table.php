<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDetailOfSubjectsTable extends Migration
{
    public function up()
    {
        Schema::table('detail_of_subjects', function (Blueprint $table) {
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->foreign('subject_id', 'subject_fk_8200829')->references('id')->on('issues');
        });
    }
}

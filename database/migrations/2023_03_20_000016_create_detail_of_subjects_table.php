<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailOfSubjectsTable extends Migration
{
    public function up()
    {
        Schema::create('detail_of_subjects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('support_date');
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

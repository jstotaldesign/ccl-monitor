<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssueResponsibilityPivotTable extends Migration
{
    public function up()
    {
        Schema::create('issue_responsibility', function (Blueprint $table) {
            $table->unsignedBigInteger('issue_id');
            $table->foreign('issue_id', 'issue_id_fk_8212326')->references('id')->on('issues')->onDelete('cascade');
            $table->unsignedBigInteger('responsibility_id');
            $table->foreign('responsibility_id', 'responsibility_id_fk_8212326')->references('id')->on('responsibilities')->onDelete('cascade');
        });
    }
}

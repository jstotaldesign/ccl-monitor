<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToIssuesTable extends Migration
{
    public function up()
    {
        Schema::table('issues', function (Blueprint $table) {
            $table->unsignedBigInteger('jobtype_id')->nullable();
            $table->foreign('jobtype_id', 'jobtype_fk_8200776')->references('id')->on('job_types');
            $table->unsignedBigInteger('categorize_priority_id')->nullable();
            $table->foreign('categorize_priority_id', 'categorize_priority_fk_8200777')->references('id')->on('ctergorize_priorities');
            $table->unsignedBigInteger('requester_id')->nullable();
            $table->foreign('requester_id', 'requester_fk_8200791')->references('id')->on('requesters');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id', 'department_fk_8200792')->references('id')->on('departments');
            $table->unsignedBigInteger('dynamics_nav_menu_id')->nullable();
            $table->foreign('dynamics_nav_menu_id', 'dynamics_nav_menu_fk_8212327')->references('id')->on('dynamics_nav_menus');
        });
    }
}

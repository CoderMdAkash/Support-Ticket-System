<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTicketsTable extends Migration
{
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->unsignedInteger('status_id');
            $table->unsignedInteger('priority_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('assigned_to_user_id')->nullable();
        });
    }
}

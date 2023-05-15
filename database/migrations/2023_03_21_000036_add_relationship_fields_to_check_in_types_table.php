<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCheckInTypesTable extends Migration
{
    public function up()
    {
        Schema::table('check_in_types', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_8215322')->references('id')->on('teams');
        });
    }
}

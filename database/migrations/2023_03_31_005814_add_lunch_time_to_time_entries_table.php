<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLunchTimeToTimeEntriesTable extends Migration
{
    public function up()
    {
        Schema::table('time_entries', function (Blueprint $table) {
            $table->dateTime('lunch_start')->nullable();
            $table->dateTime('lunch_end')->nullable();
        });
    }

    public function down()
    {
        Schema::table('time_entries', function (Blueprint $table) {
            $table->dropColumn('lunch_start');
            $table->dropColumn('lunch_end');
        });
    }
};


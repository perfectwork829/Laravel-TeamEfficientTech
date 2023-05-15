<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTotalTimeAndLunchLengthToTimeEntriesTable extends Migration
{
    public function up()
    {
        Schema::table('time_entries', function (Blueprint $table) {
            $table->unsignedInteger('total_time')->default(0)->after('lunch_end');
            $table->unsignedInteger('lunch_length')->default(0)->after('total_time');
        });
    }

    public function down()
    {
        Schema::table('time_entries', function (Blueprint $table) {
            $table->dropColumn('total_time');
            $table->dropColumn('lunch_length');
        });
    }
}
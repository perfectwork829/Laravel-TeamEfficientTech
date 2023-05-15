<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToCheckInsTable extends Migration
{
    public function up()
    {
        Schema::table('check_ins', function (Blueprint $table) {
            $table->timestamp('check_in')->nullable();
            $table->timestamp('check_out')->nullable();
            $table->unsignedBigInteger('work_type_id')->nullable();
            $table->foreign('work_type_id')->references('id')->on('time_work_types')->onDelete('set null');
            $table->text('notes')->nullable();
        });
    }

    public function down()
    {
        Schema::table('check_ins', function (Blueprint $table) {
            $table->dropColumn('check_in');
            $table->dropColumn('check_out');
            $table->dropForeign(['work_type_id']);
            $table->dropColumn('work_type_id');
            $table->dropColumn('notes');
        });
    }
}
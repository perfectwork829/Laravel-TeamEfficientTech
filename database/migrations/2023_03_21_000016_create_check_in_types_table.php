<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckInTypesTable extends Migration
{
    public function up()
    {
        Schema::create('check_in_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('check_in_type');
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

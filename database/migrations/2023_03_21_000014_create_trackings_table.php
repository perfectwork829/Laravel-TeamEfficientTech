<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackingsTable extends Migration
{
    public function up()
    {
        Schema::create('trackings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lat');
            $table->string('lon');
            $table->string('action')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

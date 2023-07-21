<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInnerServicesTable extends Migration
{
    public function up()
    {
        Schema::create('inner_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('title');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

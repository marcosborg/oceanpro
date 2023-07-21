<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceListsTable extends Migration
{
    public function up()
    {
        Schema::create('service_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('text')->nullable();
            $table->string('link')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

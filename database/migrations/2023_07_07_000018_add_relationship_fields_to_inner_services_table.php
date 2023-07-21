<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInnerServicesTable extends Migration
{
    public function up()
    {
        Schema::table('inner_services', function (Blueprint $table) {
            $table->unsignedBigInteger('service_id')->nullable();
            $table->foreign('service_id', 'service_fk_8725961')->references('id')->on('services');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToQuotationsTable extends Migration
{
    public function up()
    {
        Schema::table('quotations', function (Blueprint $table) {
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->foreign('subject_id', 'subject_fk_8725923')->references('id')->on('services');
        });
    }
}

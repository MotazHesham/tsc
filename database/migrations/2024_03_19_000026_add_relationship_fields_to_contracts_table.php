<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToContractsTable extends Migration
{
    public function up()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_9612747')->references('id')->on('users');
            $table->unsignedBigInteger('request_service_id')->nullable();
            $table->foreign('request_service_id', 'request_service_fk_9612751')->references('id')->on('request_services');
        });
    }
}

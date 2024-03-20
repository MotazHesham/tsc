<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestServicesTable extends Migration
{
    public function up()
    {
        Schema::create('request_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('message');
            $table->decimal('offer_price', 15, 2)->nullable();
            $table->string('status')->nullable();
            $table->longText('edits')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

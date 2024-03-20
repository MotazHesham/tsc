<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('contract_type');
            $table->string('city')->nullable();
            $table->longText('address')->nullable();
            $table->decimal('contract_value', 15, 2)->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('mngr_name');
            $table->string('mngr_email')->nullable();
            $table->string('mngr_phone')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

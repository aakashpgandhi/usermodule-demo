<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('business_name')->nullable();
            $table->string('business_email')->nullable();
            $table->string('abn_no')->nullable();
            $table->string('vendor_avatar')->nulllable();
            $table->string('registration_document')->nullable();
            $table->string('website')->nullable();
            $table->text('headquarters_address')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('store_address')->nullable();
            $table->text('password')->nullable();
            $table->boolean('is_active')->default('0')->comment(" 1 is active 0 is de-active ");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
}

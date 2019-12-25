<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference_no', 32)->nullable();
            $table->string('order_no', 32)->nullable();
            $table->string('contract_no', 32)->nullable();
            $table->dateTime('order_date')->nullable();
            $table->string('supplier_name', 64)->nullable();
            $table->string('product_name', 64)->nullable();
            $table->integer('product_quantity')->nullable();
            $table->string('unit', 8)->nullable();
            $table->string('pack_specification', 32)->nullable();
            $table->string('pack_net', 32)->nullable();
            $table->string('pack_weight', 32)->nullable();
            $table->integer('pack_quantity')->nullable();
            $table->string('total_net', 32)->nullable();
            $table->string('total_weight', 32)->nullable();
            $table->tinyInteger('is_pallet')->nullable();
            $table->integer('pallet_quantity')->nullable();
            $table->integer('total_volume')->nullable();
            $table->dateTime('delivery_date')->nullable();
            $table->string('forwarder_name', 64)->nullable();
            $table->tinyInteger('is_paid')->nullable();
            $table->dateTime('pay_date')->nullable();
            $table->tinyInteger('transit_state')->nullable();
            $table->integer('created_at');
            $table->integer('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipments');
    }
}

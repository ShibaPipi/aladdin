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
            $table->string('reference_no', 32);
            $table->string('order_no', 32);
            $table->string('contract_no', 32);
            $table->dateTime('order_date');
            $table->string('supplier_name', 64);
            $table->string('product_name', 64);
            $table->integer('product_quantity');
            $table->string('unit', 8);
            $table->string('pack_specification', 32);
            $table->string('pack_net', 32);
            $table->string('pack_weight', 32);
            $table->integer('pack_quantity');
            $table->string('total_net', 32);
            $table->string('total_weight', 32);
            $table->tinyInteger('is_pallet');
            $table->integer('pallet_quantity');
            $table->integer('total_volume');
            $table->dateTime('delivery_date');
            $table->string('forwarder_name', 64);
            $table->tinyInteger('is_paid');
            $table->dateTime('pay_date');
            $table->tinyInteger('transit_state');
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

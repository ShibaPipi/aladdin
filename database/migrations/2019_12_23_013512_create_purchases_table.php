<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference_no', 32);
            $table->string('order_no', 32);
            $table->string('contract_no', 32);
            $table->dateTime('order_date');
            $table->string('supplier_name', 64);
            $table->string('product_name', 64);
            $table->string('product_standard', 64);
            $table->integer('product_quantity');
            $table->string('unit', 8);
            $table->decimal('price_yuan', 8, 2);
            $table->decimal('price_dollar', 8, 2);
            $table->decimal('refund_rate', 8, 2);
            $table->tinyInteger('pay_type');
            $table->dateTime('delivery_date');
            $table->decimal('total_price_yuan', 8, 2);
            $table->decimal('total_price_dollar', 8, 2);
            $table->tinyInteger('is_paid');
            $table->dateTime('pay_date');
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
        Schema::dropIfExists('purchases');
    }
}

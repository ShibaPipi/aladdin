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
            $table->string('reference_no', 32)->nullable();
            $table->string('order_no', 32)->nullable();
            $table->string('contract_no', 32)->nullable();
            $table->dateTime('order_date')->nullable();
            $table->string('supplier_name', 64)->nullable();
            $table->string('product_name', 64)->nullable();
            $table->string('product_standard', 64)->nullable();
            $table->integer('product_quantity')->nullable();
            $table->string('unit', 8)->nullable();
            $table->decimal('price_yuan', 8, 2)->nullable();
            $table->decimal('price_dollar', 8, 2)->nullable();
            $table->decimal('refund_rate', 8, 2)->nullable();
            $table->tinyInteger('pay_type')->nullable();
            $table->dateTime('delivery_date')->nullable();
            $table->decimal('total_price_yuan', 8, 2)->nullable();
            $table->decimal('total_price_dollar', 8, 2)->nullable();
            $table->tinyInteger('is_paid')->nullable();
            $table->dateTime('pay_date')->nullable();
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

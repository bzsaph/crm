<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoldProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sold_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_id')->constrained()->onDelete('cascade'); // Reference to sales table
            $table->foreignId('stock_id')->constrained()->onDelete('cascade'); // Reference to stocks table
            $table->integer('quantity');
            $table->integer('unit_price');
            $table->integer('sold_from');
            $table->decimal('total_price', 10, 2);
            $table->string('invoice_number'); // Add invoice_number to track the sale's invoice number
            $table->integer('loged_in_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade')->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sold_products');
    }
}

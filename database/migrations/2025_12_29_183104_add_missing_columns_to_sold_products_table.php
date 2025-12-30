<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMissingColumnsToSoldProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sold_products', function (Blueprint $table) {
            // Additional fields from your JSON
            $table->string('company_tin')->nullable()->after('sold_from');
            $table->string('computation_type')->nullable()->after('company_tin');
            $table->string('sale_type')->nullable()->after('computation_type');
            $table->decimal('voucher_amount', 10, 2)->nullable()->after('sale_type');
            $table->decimal('discount_amount', 10, 2)->nullable()->after('voucher_amount');
            $table->string('business_partner_name')->nullable()->after('discount_amount');
            $table->date('invoice_date')->nullable()->after('business_partner_name');
            $table->string('client_tin')->nullable()->after('invoice_date');
            $table->decimal('total_amount', 10, 2)->nullable()->after('client_tin');
            $table->decimal('total_vat', 10, 2)->nullable()->after('total_amount');
            $table->string('client_tin_pin')->nullable()->after('total_vat');
            $table->decimal('exchange_rate', 10, 2)->nullable()->after('client_tin_pin');
            $table->string('currency')->nullable()->after('exchange_rate');
            $table->string('discount_type')->nullable()->after('currency');

            // Item-specific fields
            $table->string('item_code')->nullable()->after('discount_type');
            $table->string('item_description')->nullable()->after('item_code');
            $table->string('item_category')->nullable()->after('item_description');
            $table->string('batch')->nullable()->after('item_category');
            $table->string('tax_code')->nullable()->after('batch');
            $table->decimal('tax_rate', 5, 2)->nullable()->after('tax_code');
            $table->date('expire_date')->nullable()->after('tax_rate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sold_products', function (Blueprint $table) {
            $table->dropColumn([
                'company_tin', 'computation_type', 'sale_type', 'voucher_amount', 'discount_amount',
                'business_partner_name', 'invoice_date', 'client_tin', 'total_amount', 'total_vat',
                'client_tin_pin', 'exchange_rate', 'currency', 'discount_type',
                'item_code', 'item_description', 'item_category', 'batch', 'tax_code', 'tax_rate', 'expire_date'
            ]);
        });
    }
}

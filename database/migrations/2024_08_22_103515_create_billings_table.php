<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->enum('subscription_type', ['monthly', 'yearly']);
            $table->string('month_year');
            $table->decimal('amount', 8, 2);
            $table->enum('status', ['paid', 'unpaid'])->default('unpaid');
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
        Schema::dropIfExists('billings');
    }
}

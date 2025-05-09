<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('logo')->nullable();
            $table->string('email');
            $table->string('website')->nullable();
            $table->string('tinnumber')->nullable();
            $table->string('notes')->nullable();
            $table->string('acowner')->nullable();
            $table->string('bkaccount')->nullable();
            $table->string('bkname')->nullable();
            $table->enum('status', ['active', 'closed'])->default('active');
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
        Schema::dropIfExists('companies');
    }
}

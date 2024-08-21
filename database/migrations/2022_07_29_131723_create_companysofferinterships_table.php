<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanysofferintershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companysofferinterships', function (Blueprint $table) {
            $table->id();
            $table->string('contactperson');
            $table->string('phonenumber')->nullbal();
            $table->string('companyname')->unique();
            $table->string('star')->nullbal();
            $table->integer('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade')->nullable()->index();
            $table->enum('status',['active', 'inactive','pause']);
            $table->text('website')->nullbal();
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
        Schema::dropIfExists('companysofferinterships');
    }
}

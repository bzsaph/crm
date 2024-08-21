<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReporttotheinternershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporttotheinternerships', function (Blueprint $table) {
            $table->id();
            $table->string('supportperson');
            $table->enum('status',['active', 'inactive','pause']);
            $table->integer('company_id')->constrained('companysofferinterships')->onUpdate('cascade')->onDelete('cascade')->nullable()->index();
            $table->integer('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade')->nullable()->index();
            $table->integer('supervisor_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade')->nullable()->index();
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
        Schema::dropIfExists('reporttotheinternerships');
    }
}

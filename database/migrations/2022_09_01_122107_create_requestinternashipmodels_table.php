<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestinternashipmodelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requestinternashipmodels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assignedto')->constrained('users');
            $table->string('startingdate');
            $table->string('endingdate');
            $table->string('spname');
            $table->string('company_id');
            $table->string('spphone');
            $table->string('code');
            $table->enum('decision',['yes', 'no','wait']);
            $table->enum('status',['active', 'inactive','pause']);
            $table->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('requestinternashipmodels');
    }
}

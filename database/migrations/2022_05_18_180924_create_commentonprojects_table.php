<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentonprojectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentonprojects', function (Blueprint $table) {
            $table->id();
            $table->integer('from')->constrained('users')->onUpdate('cascade')->onDelete('cascade')->nullable()->index();
            $table->integer('to')->constrained('users')->onUpdate('cascade')->onDelete('cascade')->nullable()->index();
            $table->text('comment');
            $table->foreignId('newprojects_id')->constrained('newprojects');
            $table->integer('view')->default('0');
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
        Schema::dropIfExists('commentonprojects');
    }
}

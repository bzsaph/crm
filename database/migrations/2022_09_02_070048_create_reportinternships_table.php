<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportinternshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportinternships', function (Blueprint $table) {
            $table->id();
            $table->string('week');
            $table->longText('information');
            $table->integer('project_id')->constrained('requestinternashipmodels')->onUpdate('cascade')->onDelete('cascade')->nullable()->index();
            $table->integer('assigned_to')->constrained('users')->onUpdate('cascade')->onDelete('cascade')->nullable()->index();
            $table->integer('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade')->nullable()->index();
            $table->text('code')->nullbal();
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
        Schema::dropIfExists('reportinternships');
    }
}

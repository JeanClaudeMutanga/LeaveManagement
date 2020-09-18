<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('leaves_id');
            $table->string('start');
            $table->string('finish');
            $table->string('rate');
            $table->string('cost');
            $table->string('decision');
            $table->string('decision_by');
            $table->timestamps();
            
            $table->index('user_id');
            $table->index('leaves_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}

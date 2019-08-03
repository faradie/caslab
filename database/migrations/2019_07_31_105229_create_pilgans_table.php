<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePilgansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilgans', function (Blueprint $table) {
            $table->string('nim',9);
            $table->string('idTest');
            $table->decimal('hasil',8,2);
            $table->foreign('idTest')->references('id')->on('tes')->onDelete('CASCADE');
            $table->foreign('nim')->references('nim')->on('users')->onDelete('CASCADE');
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
        Schema::dropIfExists('pilgans');
    }
}

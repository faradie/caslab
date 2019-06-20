<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaiTulisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_tulis', function (Blueprint $table) {
            $table->string('nim',9);
            $table->string('idSoal');

            $table->boolean('hasil');

            $table->foreign('idSoal')->references('id')->on('soaltes')->onDelete('CASCADE');
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
        Schema::dropIfExists('nilai_tulis');
    }
}

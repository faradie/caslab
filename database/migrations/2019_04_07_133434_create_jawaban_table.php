<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJawabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_soal_fk');
            $table->string('jawab_a');
            $table->string('jawab_b');
            $table->string('jawab_c');
            $table->string('jawab_d');
            $table->timestamps();

            $table->foreign('id_soal_fk')->references('id')->on('soaltes')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawaban');
    }
}

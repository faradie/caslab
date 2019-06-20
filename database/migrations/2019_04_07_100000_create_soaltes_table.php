<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoaltesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soaltes', function (Blueprint $table) {
            $table->string('id')->unique()->primary();
            $table->string('pertanyaan');
            $table->string('kunci_jwb');            
            $table->string('id_tes_fk');
            $table->timestamps();

            $table->foreign('id_tes_fk')->references('id')->on('tes')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soaltes');
    }
}

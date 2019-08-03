<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWawancarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wawancaras', function (Blueprint $table) {
            $table->string('id')->unique()->primary();
            $table->string('nim',9);  
            $table->string('idTest');          
            $table->Integer('keputusan');
            $table->Integer('karakter');
            $table->Integer('microteaching');
            $table->Integer('komunikasi');
            $table->Integer('hardware');            
            $table->timestamps();

            $table->foreign('idTest')->references('id')->on('tes')->onDelete('CASCADE');
            $table->foreign('nim')->references('nim')->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wawancaras');
    }
}

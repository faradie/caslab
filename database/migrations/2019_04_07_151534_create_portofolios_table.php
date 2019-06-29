<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortofoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portofolios', function (Blueprint $table) {
            $table->string('id')->unique()->primary();
            $table->string('nim',9);
            $table->string('file')->nullable()->default(null);
            $table->string('idTest');              
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
        Schema::dropIfExists('portofolios');
    }
}

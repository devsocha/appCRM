<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('osobas', function (Blueprint $table) {
            $table->id('id_osoba');
            $table->string('imie');
            $table->string('nazwisko');
            $table->string('dział')->nullable();
            $table->string('miejscowość')->nullable();
            $table->string('stanowisko')->nullable();
            $table->integer('numer_telefonu');
            $table->string('email');
            $table->bigInteger('id_firma');
            $table->string('godziny_pracy')->nullable();
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
        Schema::dropIfExists('osobas');
    }
};

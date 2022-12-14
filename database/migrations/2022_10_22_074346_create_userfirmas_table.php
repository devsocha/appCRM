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
        Schema::create('userfirmas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('id_firma');
            $table->bigInteger('id_osoba');
            $table->integer('rola')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userfirmas');
    }
};

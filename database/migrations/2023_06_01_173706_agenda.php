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
        Schema::create('agenda', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idResp')->references('id')->on('users');
            $table->dateTime('dtInicio');
            $table->dateTime('dtFinal');
            $table->dateTime('dtConclusao')->nullable();
            $table->integer('status');
            $table->string('titulo', 150);
            $table->longText('descricao');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agenda');
    }
};

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('marca_id')->nullable();
            $table->integer('modelo_id')->nullable();
            $table->integer('corda_id')->nullable();
            $table->integer('nos');
            $table->float('cross_poly');
            $table->float('cross_nylon');
            $table->integer('cliente_id')->nullable();
            $table->date('data_encordoamento');
            $table->string('tensao');
            $table->string('corda');
            $table->float('main_cross');
            $table->string('foto')->nullable();
            $table->text('observacao')->nullable();
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
        Schema::dropIfExists('ordens');
    }
}

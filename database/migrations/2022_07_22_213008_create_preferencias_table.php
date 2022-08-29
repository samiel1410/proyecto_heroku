<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreferenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preferencias', function (Blueprint $table) {
            $table->integer('menu_id')->nullable();
            $table->integer('id')->autoIncrement();
            $table->date('fecha');
            $table->text('observacion');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            
            $table->foreign('menu_id', 'fk_preferen_menus')->references('id')->on('menus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preferencias');
    }
}

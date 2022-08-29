<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bars', function (Blueprint $table) {
            $table->integer('campus_id')->nullable();
            $table->integer('id')->autoIncrement();
            $table->string('nombre', 50);
            $table->tinyInteger('abierto');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            
            $table->foreign('campus_id', 'fk_bars_campuses')->references('id')->on('campuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bars');
    }
}

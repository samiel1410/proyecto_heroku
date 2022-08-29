<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuzonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buzons', function (Blueprint $table) {
            $table->integer('bar_id')->nullable();
            $table->integer('id')->autoIncrement();
            $table->text('descripcion');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            
            $table->foreign('bar_id', 'fk_buzons_bars')->references('id')->on('bars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buzons');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->integer('bar_id')->nullable();
            $table->integer('id')->autoIncrement();
            $table->string('nombre', 50);
            $table->decimal('precio', 3, 2);
            $table->tinyInteger('disponible');
            $table->text('descripcion')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            
            $table->foreign('bar_id', 'fk_menus_bars')->references('id')->on('bars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}

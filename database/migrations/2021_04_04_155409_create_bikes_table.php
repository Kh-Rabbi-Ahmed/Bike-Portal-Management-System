<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bikes', function (Blueprint $table) {
            $table->id();
            $table->text('image',255)->nullable();
            $table->string('name');
            $table->string('brand');
            $table->string('model');
            $table->date('year');
            $table->string('color');
            $table->double('cc');
            $table->double('power');
            $table->double('torque');
            $table->double('odo');
            $table->string('number');
            $table->string('description');
            $table->double('price_per_day');
            $table->double('discount_offer')->default(0.0);
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
        Schema::dropIfExists('bikes');
    }
}

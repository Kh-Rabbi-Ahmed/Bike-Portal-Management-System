<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bike_id')
            ->constrained('bikes')
            ->onUpdate('restrict')
            ->onDelete('restrict');

            $table->foreignId('user_id')
            ->constrained('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('insurance_id')->nullable()
            ->constrained('insurances')
            ->onUpdate('restrict')
            ->onDelete('restrict');

            $table->date('from_date');
            $table->date('to_date');
            $table->double('price_per_day','10','2')->default(0.0);
            $table->string('insurance_fee','10','2')->default(0.0);
            $table->double('total_price','10','2')->default(0.0);
            $table->double('due','10','2')->default(0.0);
            $table->text('details')->nullable();
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('bookings');
    }
}

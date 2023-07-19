<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')
            ->constrained('bookings')
            ->onUpdate('restrict')
            ->onDelete('restrict');

            $table->double('amount','10','2')->default(0.0);
            $table->string('payment_method');
            $table->string('transaction_id');
            $table->date('pay_date');
            $table->time('pay_time');
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
        Schema::dropIfExists('payments');
    }
}

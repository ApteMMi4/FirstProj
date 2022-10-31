<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaycodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paycodes', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id_from')->nullable();
            $table->integer('user_id_to')->nullable();

            $table->string('paycode_id', '64');
            $table->string('paycode_currency', '16');
            $table->decimal('paycode_amount', $precision = 65, $scale = 30);
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('paycodes');
    }
}

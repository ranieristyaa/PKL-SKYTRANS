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
        Schema::create('migas_purchases', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('name', 255);
            $table->integer('quantity')->length(5)->unsigned();
            $table->decimal('price_per_item', $precision = 10, $scale = 2)->unsigned();
            $table->decimal('total_price', $precision = 10, $scale = 2)->unsigned();
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
        Schema::dropIfExists('migas_purchases');
    }
};

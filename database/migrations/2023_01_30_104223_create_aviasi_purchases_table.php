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
        Schema::create('aviasi_purchases', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('name', 255);
            $table->integer('quantity')->length(3)->unsigned();
            $table->decimal('price', $precision = 10, $scale = 2)->unsigned();
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
        Schema::dropIfExists('aviasi_purchases');
    }
};

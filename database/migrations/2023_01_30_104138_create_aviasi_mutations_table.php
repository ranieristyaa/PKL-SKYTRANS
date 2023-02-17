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
        Schema::create('aviasi_mutations', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('name', 255);
            $table->integer('item_in')->length(3)->unsigned();
            $table->integer('item_out')->length(3)->unsigned();
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
        Schema::dropIfExists('aviasi_mutations');
    }
};

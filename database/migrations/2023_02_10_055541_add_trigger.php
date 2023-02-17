<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTrigger extends Migration
{
    public function up()
    {
        DB::unprepared('CREATE TRIGGER add_aviasi_stocks AFTER INSERT ON `aviasi_purchases` FOR EACH ROW
                BEGIN
                   INSERT INTO `aviasi_stocks` (`id`, `name`, `quantity`) VALUES (NEW.id, NEW.name, NEW.quantity);
                END');
    }
    
    public function down()
    {
        DB::unprepared('DROP TRIGGER `add_aviasi_stocks`');
    }
};

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MigasMutation extends Model
{
    use HasFactory;


     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date',
        'name',
        'description',
        'item_in',
        'item_out',
        'migas_stock_id',
        'migas_purchase_id',

    ];
}

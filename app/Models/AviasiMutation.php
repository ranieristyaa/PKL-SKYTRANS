<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AviasiMutation extends Model
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
        'aviasi_stock_id',
        'aviasi_purchase_id',
        'aviasi_rental_id',
    ];

    public function AviasiStock()
    {
        return $this->belongsTo(AviasiStock::class);
    }

    public function AviasiPurchase()
    {
        return $this->belongsTo(AviasiPurchase::class);
    }
}

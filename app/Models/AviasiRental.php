<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AviasiRental extends Model
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
        'quantity',
        'price',
        'time',
        'renter',
        'aviasi_stock_id'

    ];

    public function AviasiStock()
    {
        return $this->belongsTo(AviasiStock::class);
    }
}

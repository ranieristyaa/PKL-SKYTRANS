<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\LogOptions;

class MigasStock extends Model
{
    use HasFactory, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'quantity',
        'price_per_item',
        'total_price',

    ];

    protected static $recordEvents = ['updated', 'created', 'deleted'];
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name', 'description', 'quantity', 'price_per_item', 'total_price'])
        ->logFillable()
        ->logOnlyDirty()
        ->useLogName('Migas Stock')
        ->dontSubmitEmptyLogs();
        //>setDescriptionForEvent(fn(string $eventName) => $this->name . " {$eventName} Oleh: " . Auth::user()->name);
        // Chain fluent methods for configuration options
    }

    public function getDescriptionForEvent(string $eventName): string{
        if ($eventName == "created"){
            $event = "dibuat";
        }else if($eventName == "deleted"){
            $event = "dihapus";
        }else if($eventName == "updated"){
            $event = "diperbarui";
        }
        return "'$this->name'" . " {$event} oleh: " . Auth::user()->name;
    }

    public function MigasPurchase()
    {
        return $this->hasMany(MigasPurchase::class);
    }

    public function MigasMutation()
    {
        return $this->hasMany(MigasMutation::class);
    }

    public function MigasRental()
    {
        return $this->hasMany(MigasRental::class);
    }

}

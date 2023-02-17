<?php

namespace App\Models;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\LogOptions;

class AviasiStock extends Model
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
        'quantity'

    ];

    protected static $recordEvents = ['updated', 'created', 'deleted'];
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name', 'description', 'quantity'])
        ->logFillable()
        ->logOnlyDirty()
        ->useLogName('Aviasi Stock')
        ->dontSubmitEmptyLogs();
        //>setDescriptionForEvent(fn(string $eventName) => $this->name . " {$eventName} Oleh: " . Auth::user()->name);
        // Chain fluent methods for configuration options
    }

    public function getDescriptionForEvent(string $eventName): string{
        return "'$this->name'" . " {$eventName} by: " . Auth::user()->name;
    }

    public function AviasiPurchase()
    {
        return $this->hasMany(AviasiPurchase::class);
    }

    public function AviasiMutation()
    {
        return $this->hasMany(AviasiMutation::class);
    }

    public function AviasiRental()
    {
        return $this->hasMany(AviasiRental::class);
    }

}

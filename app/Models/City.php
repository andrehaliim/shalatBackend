<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;
    protected $table = 'city';
    protected $appends = [];
    protected $guarded = ['id'];
    protected $dates = [
    ];
    protected $casts = [
    ];    
    protected $hidden = [
    ];
    protected $visible = [
    ];
    protected $attributes = [
    ];

    protected static $logUnguarded = true;
    protected static $logOnlyDirty = true;

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($data) {
        });

        self::updating(function ($data) {
        });
    }

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

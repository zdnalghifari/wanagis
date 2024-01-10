<?php

namespace App\Models;

use App\Casts\GeoJSON;
use App\Traits\GeoModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoinKeterangan extends Model
{
    use HasFactory, GeoModel;
    protected $table = 'w05_poinketerangan';
    protected $guarded = [];
    public $timestamps = false;
    protected $casts = [
        'geom' => GeoJSON::class,
    ];
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            static::savingGeoJSON($model);
        });

        static::saved(function ($model) {
            static::savedGeoJSON($model);
        });
    }
}

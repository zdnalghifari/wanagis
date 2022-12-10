<?php

namespace App\Traits;

use App\Casts\GeoJSON;
use Illuminate\Support\Facades\DB;

trait GeoModel
{
    protected $tmpAttributes = [];

    protected static function savingGeoJSON($model)
    {
        foreach ($model->getCasts() as $key => $cls) {
            if ($cls == GeoJSON::class && is_array($model->$key)) {
                $model->tmpAttributes[$key] = $model->$key;
                $geojson = json_encode($model->$key);
                $model->setAttribute($key, DB::raw(
                    "st_geomfromgeojson('$geojson')"
                ));
            }
        }
    }

    protected static function savedGeoJSON($model)
    {
        foreach ($model->getCasts() as $key => $cls) {
            if ($cls == GeoJSON::class && isset($model->tmpAttributes[$key])) {
                $model->setAttribute($key, $model->tmpAttributes[$key]);
                unset($model->tmpAttributes[$key]);
            }
        }
    }

    public function toGeoJSON($geom = null)
    {
        if (!$geom) {
            $geom = $this->getGeomColumn();
        }
        if (!$geom || ($geom && !$this->$geom)) {
            return;
        }
        $attributes = $this->toArray();
        unset($attributes[$geom]);

        return [
            'type' => 'Feature',
            'geometry' => $this->$geom,
            'properties' => $attributes,
        ];
    }

    public function getGeomColumn()
    {
        $geom = null;
        foreach ($this->getCasts() as $key => $cls) {
            if ($cls == GeoJSON::class) {
                $geom = $key;
                break;
            }
        }
        return $geom;
    }
}

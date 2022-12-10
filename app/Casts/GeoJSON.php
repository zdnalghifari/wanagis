<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Support\Facades\DB;

class GeoJSON implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function get($model, string $key, $value, array $attributes)
    {
        if (!$value || is_array($value)) {
            return $value;
        }

        if (!ctype_print($value) || ctype_xdigit($value)) {
            try {
                $geojsonString = DB::select('select st_asgeojson(?) as geojson', [$value])[0]->geojson;
                $geojson = json_decode($geojsonString, true);
                $model->setAttribute($key, $geojson);

                return $geojson;
            } catch (\Throwable $th) {
                unset($th);
            }
        }

        try {
            $geojson = json_decode($value, true);
            if (!$geojson) {
                $geojsonString = DB::selectOne('select st_asgeojson(st_geomfromtext(?)) as geojson', [$value])->geojson;
                $geojson = json_decode($geojsonString, true);
            }
            $model->setAttribute($key, $geojson);
            return $geojson;
        } catch (\Throwable $th) {
            unset($th);
        }
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, string $key, $value, array $attributes)
    {
        return [$key => $value];
    }
}

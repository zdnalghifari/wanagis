<?php

namespace App;

use Illuminate\Support\Facades\DB;

class Helper
{
    public static function getGeoJSON($table, $geoColumn = 'geom')
    {
        $result = DB::table($table, 't')
            ->selectRaw("json_build_object(
                'type', 'FeatureCollection', 
                'features', coalesce(json_agg(st_asgeojson(t.*, '$geoColumn')::json), '[]'::json)
                ) as geojson")
            ->whereNotNull($geoColumn)
            ->first();

        return $result->geojson;
    }
}

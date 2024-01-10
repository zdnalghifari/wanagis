<?php

namespace App;

use Illuminate\Database\MySqlConnection;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Helper
{

    /**
     * Get table columns.
     *
     * @param  string $table
     * @param  bool   $withType
     * @return array
     */
    public static function getColumns(string $table, $withType = true)
    {
        if ($withType) {
            return array_map(function ($col) {
                return $col->getType()->getName();
            }, static::getDoctrineColumns($table));
        }

        return static::getColumnListing($table);
    }

    /**
     * Get table columns.
     *
     * @param  string $table
     * @return array
     */
    public static function getDoctrineColumns(string $table)
    {
        try {
            return DB::getDoctrineSchemaManager()->listTableColumns($table);
        } catch (\Throwable $th) {
            logger()->error($th->getMessage());

            return [];
        }
    }

    private static function getColumnListing(string $table)
    {
        $connection = Schema::getConnection();

        if ($connection instanceof MySqlConnection) {
            $grammar = $connection->getSchemaGrammar();
            $table = $connection->getTablePrefix() . $table;
            $results = $connection->select(
                $grammar->compileColumnListing() . ' order by ordinal_position',
                [$connection->getDatabaseName(), $table]
            );

            return $connection->getPostProcessor()->processColumnListing($results);
        }

        return Schema::getColumnListing($table);
    }

    public static function getGeoJSON($table, $geomColumn = 'geom')
    {
        $db_driver = DB::connection()->getDriverName();

        if ($db_driver == 'pgsql') {
            $result = DB::table($table, 't')
                ->selectRaw("json_build_object(
                            'type', 'FeatureCollection',
                            'features', coalesce(json_agg(st_asgeojson(t.*, '$geomColumn')::json), '[]'::json)
                        ) as geojson")
                ->whereNotNull($geomColumn)
                ->first();

            return $result->geojson;
        } elseif ($db_driver == 'mysql') {
            $columns = array_diff(self::getColumns($table, false), [$geomColumn]);
            $columns[] = DB::raw("ST_AsGeoJSON($geomColumn) as geometry");
            $result = DB::table($table)->whereNotNull($geomColumn)->get($columns);
            $features = [];

            foreach ($result as $record) {
                if ($record->geometry) {
                    $features[] = [
                        'type' => 'Feature',
                        'geometry' => json_decode($record->geometry, true),
                        'properties' => Arr::except((array) $record, ['geometry']),
                    ];
                }
            }

            $geojson = [
                'type' => 'FeatureCollection',
                'features' => $features,
            ];

            return json_encode($geojson);
        } else {
            throw new \Exception('Unsupported database driver.');
        }
    }
}

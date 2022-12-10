<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Karomap\GeoLaravel\DoctrineTypes\GeographyType;
use Karomap\GeoLaravel\DoctrineTypes\GeometryType;
use Karomap\GeoLaravel\DoctrineTypes\LineStringType;
use Karomap\GeoLaravel\DoctrineTypes\MultiLineStringType;
use Karomap\GeoLaravel\DoctrineTypes\MultiPointType;
use Karomap\GeoLaravel\DoctrineTypes\MultiPolygonType;
use Karomap\GeoLaravel\DoctrineTypes\PolygonType;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        try {
            $customDoctrineTypes = [
                GeometryType::class,
                PointType::class,
                PolygonType::class,
                LineStringType::class,
                MultiPointType::class,
                MultiLineStringType::class,
                MultiPolygonType::class,
            ];
            $doctrinePlatform = DB::getDoctrineSchemaManager()->getDatabasePlatform();

            foreach ($customDoctrineTypes as $typeClass) {
                DB::connection()->registerDoctrineType($typeClass, $typeClass::NAME, $typeClass::NAME);
                $doctrinePlatform->registerDoctrineTypeMapping($typeClass::NAME, $typeClass::NAME);
            }
        } catch (\Throwable $th) {
            logger()->error($th);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use App\DoctrineTypes\GeographyType;
use App\DoctrineTypes\GeometryType;
use App\DoctrineTypes\LineStringType;
use App\DoctrineTypes\MultiLineStringType;
use App\DoctrineTypes\MultiPointType;
use App\DoctrineTypes\MultiPolygonType;
use App\DoctrineTypes\PolygonType;

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

<?php

namespace App\Http\Controllers;

use App\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;


class GeoJSONController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, string $table, $geom = 'geom')
    {
        abort_unless(Schema::hasTable($table), 404, "Table $table tidak ditemukan");

        try {
            $content = Helper::getGeoJSON($table, $geom);
        } catch (\Throwable $th) {
            logger()->error($th);
            return abort(500, 'Terjadi kesalahan. Silahkan ulangi');
        };

        $headers = [
            'Content-Type' => 'application/json',
            'Cache-Control' => $request->nocache ? 'no-cache' : 'max-age=86400, private',
        ];

        return response($content, 200, $headers);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\PoinKeterangan;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class EditPointController extends Controller
{
    public function store(Request $request)
    {
        $attrs = $request->validate([
            'KODE' => ['required', 'integer'],
            'KET' => ['required', 'string'],
            'geom' => ['required', 'array'],
            'geom.type' => ['required_with:geom', 'in:Point'],
            'geom.coordinates' => ['required_with:geom', 'array'],
        ]);

        try {
            $poin = PoinKeterangan::create($attrs);
            return $poin;
        } catch (\Throwable $th) {
            logger()->error($th->getMessage());

            return abort(500, "Terjadi kesalahan");
        }
    }

    public function update(Request $request, PoinKeterangan $poin)
    {
        $attrs = $request->validate([
            'KODE' => ['sometimes', 'required', 'integer'],
            'KET' => ['sometimes', 'required', 'string'],
            'geom' => ['sometimes', 'required', 'array'],
            'geom.type' => ['required_with:geom', 'in:Point'],
            'geom.coordinates' => ['required_with:geom', 'array'],
        ]);

        try {
            $poin->update($attrs);
            return $poin;
        } catch (\Throwable $th) {
            logger()->error($th->getMessage());

            return abort(500, "Terjadi kesalahan");
        }
    }

    public function destroy(PoinKeterangan $poin)
    {
        try {
            $poin->delete();

            return response(['message' => 'Data berhasil dihapus']);
        } catch (\Throwable $th) {
            logger()->error($th->getMessage());

            return abort(500, "Terjadi kesalahan");
        }
    }
}

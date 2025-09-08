<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UnitKerjaController extends Controller
{
    public function index(): JsonResponse
    {
        $unitKerja = UnitKerja::with(['skpd'])->get();
        
        return response()->json([
            'success' => true,
            'message' => 'Data unit kerja berhasil diambil',
            'data' => $unitKerja
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'unit_kerja' => 'required|string|max:255',
            'skpd_id' => 'required|exists:skpd,id'
        ]);

        $unitKerja = UnitKerja::create($request->all());
        $unitKerja->load('skpd');

        return response()->json([
            'success' => true,
            'message' => 'Unit kerja berhasil ditambahkan',
            'data' => $unitKerja
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $unitKerja = UnitKerja::with(['skpd'])->find($id);

        if (!$unitKerja) {
            return response()->json([
                'success' => false,
                'message' => 'Unit kerja tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data unit kerja berhasil diambil',
            'data' => $unitKerja
        ]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $unitKerja = UnitKerja::find($id);

        if (!$unitKerja) {
            return response()->json([
                'success' => false,
                'message' => 'Unit kerja tidak ditemukan'
            ], 404);
        }

        $request->validate([
            'unit_kerja' => 'required|string|max:255',
            'skpd_id' => 'required|exists:skpd,id'
        ]);

        $unitKerja->update($request->all());
        $unitKerja->load('skpd');

        return response()->json([
            'success' => true,
            'message' => 'Unit kerja berhasil diperbarui',
            'data' => $unitKerja
        ]);
    }

    public function destroy(string $id): JsonResponse
    {
        $unitKerja = UnitKerja::find($id);

        if (!$unitKerja) {
            return response()->json([
                'success' => false,
                'message' => 'Unit kerja tidak ditemukan'
            ], 404);
        }

        $unitKerja->delete();

        return response()->json([
            'success' => true,
            'message' => 'Unit kerja berhasil dihapus'
        ]);
    }
}
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Skpd;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SkpdController extends Controller
{
    public function index(): JsonResponse
    {
        $skpd = Skpd::with(['unitKerja'])->get();
        
        return response()->json([
            'success' => true,
            'message' => 'Data SKPD berhasil diambil',
            'data' => $skpd
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'skpd' => 'required|string|max:255'
        ]);

        $skpd = Skpd::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'SKPD berhasil ditambahkan',
            'data' => $skpd
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $skpd = Skpd::with(['unitKerja'])->find($id);

        if (!$skpd) {
            return response()->json([
                'success' => false,
                'message' => 'SKPD tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data SKPD berhasil diambil',
            'data' => $skpd
        ]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $skpd = Skpd::find($id);

        if (!$skpd) {
            return response()->json([
                'success' => false,
                'message' => 'SKPD tidak ditemukan'
            ], 404);
        }

        $request->validate([
            'skpd' => 'required|string|max:255'
        ]);

        $skpd->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'SKPD berhasil diperbarui',
            'data' => $skpd
        ]);
    }

    public function destroy(string $id): JsonResponse
    {
        $skpd = Skpd::find($id);

        if (!$skpd) {
            return response()->json([
                'success' => false,
                'message' => 'SKPD tidak ditemukan'
            ], 404);
        }

        $skpd->delete();

        return response()->json([
            'success' => true,
            'message' => 'SKPD berhasil dihapus'
        ]);
    }
}
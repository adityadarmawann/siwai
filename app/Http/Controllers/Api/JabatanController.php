<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class JabatanController extends Controller
{
    public function index(): JsonResponse
    {
        $jabatan = Jabatan::all();
        
        return response()->json([
            'success' => true,
            'message' => 'Data jabatan berhasil diambil',
            'data' => $jabatan
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'jabatan' => 'required|string|max:255'
        ]);

        $jabatan = Jabatan::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Jabatan berhasil ditambahkan',
            'data' => $jabatan
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $jabatan = Jabatan::find($id);

        if (!$jabatan) {
            return response()->json([
                'success' => false,
                'message' => 'Jabatan tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data jabatan berhasil diambil',
            'data' => $jabatan
        ]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $jabatan = Jabatan::find($id);

        if (!$jabatan) {
            return response()->json([
                'success' => false,
                'message' => 'Jabatan tidak ditemukan'
            ], 404);
        }

        $request->validate([
            'jabatan' => 'required|string|max:255'
        ]);

        $jabatan->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Jabatan berhasil diperbarui',
            'data' => $jabatan
        ]);
    }

    public function destroy(string $id): JsonResponse
    {
        $jabatan = Jabatan::find($id);

        if (!$jabatan) {
            return response()->json([
                'success' => false,
                'message' => 'Jabatan tidak ditemukan'
            ], 404);
        }

        $jabatan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Jabatan berhasil dihapus'
        ]);
    }
}
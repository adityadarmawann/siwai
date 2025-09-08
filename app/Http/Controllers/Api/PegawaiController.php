<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PegawaiController extends Controller
{
    public function index(): JsonResponse
    {
        $pegawai = Pegawai::with(['jabatan', 'skpd', 'unitKerja'])->get();
        
        return response()->json([
            'success' => true,
            'message' => 'Data pegawai berhasil diambil',
            'data' => $pegawai
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'nip' => 'required|string|unique:pegawai,nip',
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'jabatan_id' => 'required|exists:jabatan,id',
            'skpd_id' => 'required|exists:skpd,id',
            'unit_kerja_id' => 'required|exists:unit_kerja,id',
            'nama_golongan' => 'required|string|max:255',
            'nama_pangkat' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string'
        ]);

        $pegawai = Pegawai::create($request->all());
        $pegawai->load(['jabatan', 'skpd', 'unitKerja']);

        return response()->json([
            'success' => true,
            'message' => 'Pegawai berhasil ditambahkan',
            'data' => $pegawai
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $pegawai = Pegawai::with(['jabatan', 'skpd', 'unitKerja'])->find($id);

        if (!$pegawai) {
            return response()->json([
                'success' => false,
                'message' => 'Pegawai tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data pegawai berhasil diambil',
            'data' => $pegawai
        ]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $pegawai = Pegawai::find($id);

        if (!$pegawai) {
            return response()->json([
                'success' => false,
                'message' => 'Pegawai tidak ditemukan'
            ], 404);
        }

        $request->validate([
            'nip' => 'required|string|unique:pegawai,nip,' . $id,
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'jabatan_id' => 'required|exists:jabatan,id',
            'skpd_id' => 'required|exists:skpd,id',
            'unit_kerja_id' => 'required|exists:unit_kerja,id',
            'nama_golongan' => 'required|string|max:255',
            'nama_pangkat' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string'
        ]);

        $pegawai->update($request->all());
        $pegawai->load(['jabatan', 'skpd', 'unitKerja']);

        return response()->json([
            'success' => true,
            'message' => 'Pegawai berhasil diperbarui',
            'data' => $pegawai
        ]);
    }

    public function destroy(string $id): JsonResponse
    {
        $pegawai = Pegawai::find($id);

        if (!$pegawai) {
            return response()->json([
                'success' => false,
                'message' => 'Pegawai tidak ditemukan'
            ], 404);
        }

        $pegawai->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pegawai berhasil dihapus'
        ]);
    }
}
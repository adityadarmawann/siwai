<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique();
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->foreignId('jabatan_id')->constrained('jabatan')->onDelete('cascade');
            $table->foreignId('skpd_id')->constrained('skpd')->onDelete('cascade');
            $table->foreignId('unit_kerja_id')->constrained('unit_kerja')->onDelete('cascade');
            $table->string('nama_golongan');
            $table->string('nama_pangkat');
            $table->text('alamat_lengkap');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};

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
        if (!Schema::hasTable('detail_peminjamen')) {
            Schema::create('detail_peminjamen', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('id_peminjaman');
                $table->string('kode_buku', 10);
                $table->integer('jumlah');
                $table->timestamps();
    
                $table->foreign('id_peminjaman')->references('id')->on('borrowings')->onDelete('cascade');
                $table->foreign('kode_buku')->references('kode_buku')->on('classrooms')->onDelete('cascade');
            });
        }
    }
    
    public function down(): void
    {
        Schema::dropIfExists('detail_peminjamen');
    }
    
};

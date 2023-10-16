<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// <th class="col">No</th>
//                     <th class="col">Foto</th>
//                     <th class="col">Nama</th>
//                     <th class="col">Alamat</th>
//                     <th class="col">Link</th>
//                     <th class="col">Deskripsi</th>
//                     <th class="col">Action</th>
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('destinasis', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->string('nama');
            $table->string('alamat');
            $table->string('link');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinasis');
    }
};

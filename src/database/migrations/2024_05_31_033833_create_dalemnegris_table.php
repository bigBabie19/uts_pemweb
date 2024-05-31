<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dalemnegris', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_beasiswa');
            $table->longText('pengumuman');
            $table->timestamps();
            $table->softDeletes();
        });
    }

 
};

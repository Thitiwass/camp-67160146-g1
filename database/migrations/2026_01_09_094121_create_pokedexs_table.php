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
        Schema::create('pokedexs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('species')->nullable();
            $table->double('height')->nullable();
            $table->double('weight')->nullable();
            $table->double('hp')->default(0);
            $table->double('attack')->default(0);
            $table->double('defense')->default(0);
            
            // ใช้ text เพื่อรองรับข้อมูลรูปภาพที่ยาวมาก (Base64)
            $table->text('image_url')->nullable(); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // คำสั่งสำหรับลบตารางทิ้งเมื่อสั่ง rollback หรือ fresh
        Schema::dropIfExists('pokedexs');
    }
};
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
        Schema::create('fav_meds', function (Blueprint $table) { 
            $table->string('sci_name'); 
            $table->string('adv_name'); 
            $table->string('company_id');
            $table->string('store_name'); 
            $table->integer('quantity'); 
            $table->integer('price'); 
            $table->date('expiration_date'); 
            $table->foreignId('class_id')->constrained('classifications')->cascadeOnDelete();
            $table->foreignId('med_id')->constrained('meds')->cascadeOnDelete(); 
        }); 
    } 
 
    /** 
     * Reverse the migrations. 
     */ 
    public function down(): void 
    { 
        Schema::dropIfExists('fav_meds'); 
    } 
};
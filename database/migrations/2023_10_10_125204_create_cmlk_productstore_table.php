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
        Schema::create('cmlk_productstore', function (Blueprint $table) {
        $table->id(); //id
        $table->unsignedInteger('product_id');
        $table->double('price');
        $table->unsignedInteger('qty');
        $table->timestamps(); //created_at, updated_at
        $table->unsignedInteger('created_by')->default(1);
        $table->unsignedInteger('updated_by')->nullable();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cmlk_productstore');
    }
};
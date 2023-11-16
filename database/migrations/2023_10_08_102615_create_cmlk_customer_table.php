<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        public function up()
    {
        Schema::create('cmlk_customer', function (Blueprint $table) {
            $table->id();            
            $table->string('name');
            $table->string('username');
            $table->string('slug',1000);
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->string('image')->nullable();
            $table->string('gender')->nullable();
            $table->string('roles');
            $table->string('address')->nullable();
            $table->unsignedInteger('created_by')->default(1);
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedTinyInteger('status')->default(2);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('cmlk_customer');
    }
};
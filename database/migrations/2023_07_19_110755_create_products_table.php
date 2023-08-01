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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('catagory');
            $table->string('title');
            $table->float('cost');
            $table->string('detail');
            $table->string('photo')->nullable();
            $table->timestamps();
            $table->enum('status',['show','hide'])->defult('hide');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

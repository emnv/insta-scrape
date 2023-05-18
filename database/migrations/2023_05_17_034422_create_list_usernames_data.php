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
        Schema::create('list_usernames_data', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->integer('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('race')->nullable();
            $table->double('attractive')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_usernames_data');
    }
};

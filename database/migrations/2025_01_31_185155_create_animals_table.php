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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->foreignId("type_id");
            $table->date("date_of_birth");
            $table->date("date_of_admisson");
            $table->string("description");
            $table->foreignId("gender_id");
            $table->boolean("adopted")->default(false);            
            $table->string("image")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
//állatok tábla
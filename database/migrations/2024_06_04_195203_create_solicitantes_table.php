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
        Schema::create('solicitantes', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100);
            $table->string('contato',100)->nullable();
            $table->string('matricula',50)->nullable();
            $table->string('telefone_comercial',20)->nullable();
            $table->string('telefone_celular',20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitantes');
    }
};

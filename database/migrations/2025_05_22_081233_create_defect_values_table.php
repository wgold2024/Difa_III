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
        Schema::create('defect_values', function (Blueprint $table) {
            $table->id();

            $table->foreignId('defect_id')->index()->constrained('defects')->onDelete('cascade');

            $table->string('name')->nullable();
            $table->string('measure_unit')->nullable();
            $table->string('visibility_defect_id')->nullable();
            $table->string('visibility_defect_value')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('defect_values');
    }
};

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
        Schema::create('defect_data', function (Blueprint $table) {
            $table->id();

            $table->foreignId('input_id')->index()->constrained('inputs')->onDelete('cascade');
            $table->string('unit')->nullable();
            $table->unsignedBigInteger('section_number');
            $table->foreignId('detail_id')->index()->constrained('details')->onDelete('cascade');
            $table->foreignId('defect_id')->index()->constrained('defects')->onDelete('cascade');
            $table->string('value')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('defect_data');
    }
};

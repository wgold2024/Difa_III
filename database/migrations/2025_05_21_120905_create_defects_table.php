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
        Schema::create('defects', function (Blueprint $table) {
            $table->id();

            $table->foreignId('detail_id')->index()->constrained('details')->onDelete('cascade');
            $table->foreignId('group_id')->nullable()->index()->constrained('groups')->onDelete('cascade');

            $table->string('name');
            $table->string('type');
            $table->boolean('is_option')->default(false);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('defects');
    }
};

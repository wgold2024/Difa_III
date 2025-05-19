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
        Schema::create('inputs', function (Blueprint $table) {
            $table->id();
            $table->string('op');
            $table->string('city');
            $table->string('company');
            $table->string('field');
            $table->string('cluster');
            $table->string('well');
            $table->timestamp('installation_date_at');
            $table->timestamp('start_date_at');
            $table->timestamp('stop_date_at');
            $table->timestamp('dismantling_date_at');
            $table->timestamp('analysis_date_at');
            $table->integer('operating_time');
            $table->string('stop_reason');
            $table->string('mode');
            $table->string('sl_key')->nullable();
            $table->text('note')->nullable();

            $table->foreignId('user_id')->index()->constrained('users')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inputs');
    }
};

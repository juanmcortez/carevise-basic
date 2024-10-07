<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('demographics_providers', function (Blueprint $table) {
            $table->id();

            $table->string('npi');
            $table->string('taxonomy')->nullable();
            $table->string('federal_tax')->nullable();
            $table->string('specialty')->nullable();

            $table->boolean('is_calendar_active')->default(false)->nullable();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('demographics_providers');
    }
};

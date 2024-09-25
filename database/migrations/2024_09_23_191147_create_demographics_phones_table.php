<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('demographics_phones', function (Blueprint $table) {
            $table->id();

            $table->string('country_code', 7)->nullable();
            $table->string('area_code', 4)->nullable();
            $table->string('prefix_number', 5)->nullable();
            $table->string('line_number', 5)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('demographics_phones');
    }
};

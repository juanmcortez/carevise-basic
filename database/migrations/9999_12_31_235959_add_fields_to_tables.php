<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', static function (Blueprint $table) {
            /*$table->boolean('is_active')
                ->default(true)
                ->after('id');

            $table->boolean('is_provider')
                ->default(false)
                ->after('is_active');*/

            $table->foreignId('demographic_id')
                ->after('password')
                ->constrained('demographics')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('users', static function (Blueprint $table) {
            $table->dropConstrainedForeignId('demographic_id');
        });
    }
};

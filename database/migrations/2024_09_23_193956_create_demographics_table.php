<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('demographics', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();

            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');

            $table->string('birthdate');
            $table->string('gender');

            $table->foreignId('email_address_id')
                ->constrained('demographics_emails_addresses')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('address_id')
                ->constrained('demographics_addresses')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('phone_id')
                ->constrained('demographics_phones')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('cellphone_id')
                ->constrained('demographics_phones')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('demographics');
    }
};

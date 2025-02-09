<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('demographics', function (Blueprint $table) {
            $table->id();

            $table->string('title', 12)->nullable();

            $table->string('first_name', 128);
            $table->string('middle_name', 128)->nullable();
            $table->string('last_name', 128);

            $table->dateTime('birthdate');
            $table->string('gender', 64);

            $table->longText('about_me')->nullable();

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

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::table('demographics', static function (Blueprint $table) {
            $table->dropConstrainedForeignId('cellphone_id');
            $table->dropConstrainedForeignId('phone_id');
            $table->dropConstrainedForeignId('address_id');
            $table->dropConstrainedForeignId('email_address_id');
        });

        Schema::dropIfExists('demographics');
    }
};

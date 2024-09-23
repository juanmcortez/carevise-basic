<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::create('demographic_email_addresses', function (Blueprint $table) {
            $table->id();

            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('demographic_email_addresses');
    }
};

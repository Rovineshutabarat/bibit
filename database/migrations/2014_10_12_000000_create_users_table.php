<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('google_id')->nullable()->unique();
            $table->string('username', 50)->nullable(false);
            $table->string('email', 70)->unique()->nullable(false);
            $table->string('password', 255)->nullable(false);
            $table->text('image')->nullable();
            $table->text('address')->nullable();
            $table->string('contact', 15)->nullable();
            $table->tinyInteger('role')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

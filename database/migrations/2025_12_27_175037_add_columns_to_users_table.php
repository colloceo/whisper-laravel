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
        Schema::table('users', function (Blueprint $table) {
            $table->string('anonymous_username')->nullable()->unique()->after('email');
            $table->boolean('is_admin')->default(false)->after('password');
            $table->timestamp('guidelines_accepted_at')->nullable()->after('is_admin');
            $table->timestamp('last_login_at')->nullable()->after('guidelines_accepted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['anonymous_username', 'is_admin', 'guidelines_accepted_at', 'last_login_at']);
        });
    }
};

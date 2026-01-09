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
            $table->boolean('daily_reminders')->default(true)->after('last_seen_at');
            $table->boolean('crisis_alerts')->default(true)->after('daily_reminders');
            $table->boolean('anonymous_mode')->default(false)->after('crisis_alerts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['daily_reminders', 'crisis_alerts', 'anonymous_mode']);
        });
    }
};

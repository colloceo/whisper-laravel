<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('journal_entries', function (Blueprint $table) {
            $table->integer('mood_score')->nullable()->after('content');
            $table->text('ai_response')->nullable()->after('mood_score');
            $table->boolean('is_private')->default(true)->after('ai_response');

            // Drop old column if it exists
            if (Schema::hasColumn('journal_entries', 'ai_reflection')) {
                $table->dropColumn('ai_reflection');
            }
        });
    }

    public function down(): void
    {
        Schema::table('journal_entries', function (Blueprint $table) {
            $table->dropColumn(['mood_score', 'ai_response', 'is_private']);
            $table->text('ai_reflection')->nullable();
        });
    }
};

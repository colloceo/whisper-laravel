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
        Schema::table('messages', function (Blueprint $table) {
            // Drop the existing foreign key
            $table->dropForeign(['parent_id']);

            // Re-add with null on delete
            $table->foreign('parent_id')
                ->references('id')
                ->on('messages')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);

            $table->foreign('parent_id')
                ->references('id')
                ->on('messages')
                ->onDelete('cascade');
        });
    }
};

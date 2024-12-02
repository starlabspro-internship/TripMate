<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the existing 'verified' column if it exists
            if (Schema::hasColumn('users', 'verified')) {
                $table->dropColumn('verified');
            }

            // Add the new 'verification_status' column as an enum
            $table->enum('verification_status', ['pending', 'verified', 'rejected'])->nullable()->default(null);
            $table->string('id_document')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the 'verification_status' column
            $table->dropColumn('verification_status');
            $table->dropColumn('id_document');
            // Restore the original 'verified' boolean column
            $table->boolean('verified')->default(false);
        });
    }
};

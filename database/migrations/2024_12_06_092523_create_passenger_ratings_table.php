<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Trip;
use App\Models\User;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('passenger_ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Trip::class, 'trip_id')->constrained()->onDelete('cascade');
            $table->foreignIdFor(User::class, 'reviewer_id')->constrained()->onDelete('cascade');
            $table->foreignIdFor(User::class, 'reviewed_id')->constrained()->onDelete('cascade');
            $table->enum('rating', ['1', '2', '3', '4', '5']);
            $table->text('feedback')->nullable();

            $table->timestamps();
            $table->unique(['trip_id', 'reviewer_id', 'reviewed_id'], 'unique_trip_reviewer_reviewed');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('passenger_ratings');
    }
};

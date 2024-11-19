<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Trip;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Trip::class, 'trip_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignIdFor(User::class, 'passenger_id')->constrained()->onDelete('cascade');
            $table->integer('seats_booked');
            $table->decimal('total_price', 8, 2);
            $table->string('session_id')->nullable();
            $table->string('status')->default('active');
            $table->string('stripe_charge_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};

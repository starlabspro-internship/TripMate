<?php

use App\Models\Trip;
use App\Models\User;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

  public function up(): void
  {
    Schema::create('sos_alerts', function (Blueprint $table) {
        $table->id();
        $table->foreignIdFor(User::class, 'user_id')->constrained()->onDelete('cascade');
        $table->foreignIdFor(Trip::class, 'trip_id')->constrained()->onDelete('cascade');
        $table->string('location')->nullable();
        $table->decimal('latitude', 20, 10)->nullable();
        $table->decimal('longitude', 20, 10)->nullable();
        $table->enum('status', ['pending', 'resolved'])->default('pending');
        $table->timestamps();
    });
}

  public function down(): void
  {
    Schema::dropIfExists('sos_alerts');
  }
};
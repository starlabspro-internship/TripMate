<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\City;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'driver_id')->constrained()->onDelete('cascade');
            $table->foreignIdFor(City::class, 'origin_city_id' )->constrained()->onDelete('cascade');
            $table->foreignIdFor(City::class, 'destination_city_id')->constrained()->onDelete('cascade');
            $table->dateTime('departure_time');
            $table->dateTime('arrival_time');
            $table->integer('available_seats');
            $table->decimal('price', 8, 2);
            $table->string('driver_comments')->nullable();
            $table->string('passenger_gender_preference')->default('all');
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->enum('status', ['Waiting', 'In Progress', 'Completed' , 'Failed'])->default('Waiting');
            $table->dateTime('start_time')->nullable();  
            $table->dateTime('end_time')->nullable();
           

           
           

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};

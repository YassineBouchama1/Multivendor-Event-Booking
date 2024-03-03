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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('cover');
            $table->longText('description');
            $table->decimal('location_latitude', 10, 8);;
            $table->decimal('location_longitude', 11, 8);
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('organizer_id')->constrained('users');
            $table->dateTime('date');
            $table->decimal('price');
            $table->integer('places');
            $table->string('city');
            $table->enum('status', ['waiting', 'approved', 'canceled', 'ended'])
                ->default('waiting');
            $table->enum('reservation_method', ['manual', 'automatic'])->default('automatic');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};

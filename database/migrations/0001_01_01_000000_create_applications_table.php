<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('flight_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['pending', 'shortlisted', 'final', 'paid'])->default('pending');
            $table->text('remarks')->nullable();
            $table->timestamps();
            
            $table->unique(['user_id', 'flight_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('applications');
    }
};
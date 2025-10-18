<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('from');
            $table->string('to');
            $table->date('departure_date');
            $table->time('departure_time');
            $table->integer('capacity');
            $table->enum('status', ['open', 'closed', 'shortlisted', 'finalized'])->default('open');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('flights');
    }
};
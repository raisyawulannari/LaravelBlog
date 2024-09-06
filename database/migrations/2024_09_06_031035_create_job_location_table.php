<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('job_location', function (Blueprint $table) {
            // $table->unsignedBigInteger('job_id');
            // $table->unsignedBigInteger('location_id');
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');

            // Pastikan tidak ada duplikasi
            //$table->primary(['job_id', 'location_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_location');
    }
};

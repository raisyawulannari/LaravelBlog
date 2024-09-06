<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id(); // Primary key auto-increment
            $table->string('activity_name')->index();
            $table->string('platform'); // Default value tidak diatur
            $table->longText('description'); // Default value tidak diatur
            $table->dateTime('deadline');
            $table->timestamps();

            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropForeign(['post_id']);
            // Jika Anda tidak ingin menghapus kolom ini, hapus komentar di bawah
            // $table->dropColumn('post_id');
        });

        Schema::dropIfExists('jobs');
    }
};

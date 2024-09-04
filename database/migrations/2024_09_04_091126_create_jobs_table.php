<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('platform')->index();
            // $table->string('platform')->default('default_value');
            $table->longText('description');
            // $table->longText('description')->default('default_value');
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
            // $table->dropColumn('post_id');
            $table->string('platform')->default(null)->change();
            $table->string('description')->default(null)->change();
        });

        Schema::dropIfExists('jobs');
    }
};

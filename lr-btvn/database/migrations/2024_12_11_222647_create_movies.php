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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Tên phim
            $table->string('director'); // Đạo diễn
            $table->date('release_date'); // Ngày phát hành
            $table->integer('duration'); // Thời lượng phim (phút)
            $table->unsignedBigInteger('cinema_id'); // Khóa ngoại đến bảng cinemas
            $table->foreign('cinema_id')->references('id')->on('cinemas')->onDelete('cascade'); // Ràng buộc khóa ngoại
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};

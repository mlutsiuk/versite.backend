<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {    // TODO
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('description');
//            $table->unsignedBigInteger('author_id');    TODO: courses.author_id

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void    // TODO
    {
        Schema::dropIfExists('courses');
    }
};

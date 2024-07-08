<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('slideshows', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')
                ->comment('unique id');
            $table->foreignIdFor(User::class)
                ->constrained()
                ->cascadeOnDelete()
                ->comment('id table users');
            $table->string('slug')
                ->unique()
                ->nullable()
                ->comment('slug');
            $table->string('title')
                ->unique()
                ->nullable()
                ->comment('judul');
            $table->string('description')
                ->nullable()
                ->comment('deskripsi');
            $table->string('file')
                ->nullable()
                ->comment('gambar');
            $table->boolean('is_show')
                ->default(true)
                ->comment('status tampilkan');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slideshows');
    }
};

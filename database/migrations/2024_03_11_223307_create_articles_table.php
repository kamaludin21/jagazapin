<?php

use App\Models\User;
use App\Models\Category;
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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')
                ->comment('unique id');
            $table->foreignIdFor(User::class)
                ->constrained()
                ->cascadeOnDelete()
                ->comment('id table users');
            $table->foreignIdFor(Category::class)
                ->constrained()
                ->cascadeOnDelete()
                ->comment('id table categories');
            $table->string('slug')
                ->unique()
                ->comment('slug');
            $table->string('title')
                ->unique()
                ->comment('judul');
            $table->longText('content')
                ->nullable()
                ->comment('isi ');
            $table->string('description')
                ->nullable()
                ->comment('keterangan file');
            $table->string('file')
                ->nullable()
                ->comment('gambar cover');
            $table->json('attachment')
                ->nullable()
                ->comment('gambar galeri foto');
            $table->bigInteger('visitor')
                ->default(0)
                ->comment('jumlah pengunjung');
            $table->boolean('is_show')
                ->default(true)
                ->comment('status tampilkan');
            $table->timestamp('published_at')
                ->nullable()
                ->comment('diterbitkan');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};

<?php

use App\Models\FileCategory;
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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')
                ->comment('unique id');
            $table->foreignIdFor(User::class)
                ->constrained()
                ->cascadeOnDelete()
                ->comment('id table users');
            $table->foreignIdFor(FileCategory::class)
                ->constrained()
                ->cascadeOnDelete()
                ->comment('id table file category');
            $table->text('slug')
                ->comment('slug');
            $table->text('title')
                ->comment('judul');
            $table->string('file')
                ->nullable()
                ->comment('gambar cover');
            $table->string('attachment')
                ->nullable()
                ->comment('lampiran file: pdf, doc, xls, ppt, jpg, png, dll');
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
        Schema::dropIfExists('files');
    }
};

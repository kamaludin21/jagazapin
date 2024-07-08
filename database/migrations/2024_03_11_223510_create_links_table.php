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
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')
                ->comment('unique id');
            $table->foreignIdFor(User::class)
                ->constrained()
                ->cascadeOnDelete()
                ->comment('id table users');
            $table->string('slug')
                ->unique()
                ->comment('slug');
            $table->string('title')
                ->unique()
                ->comment('judul');
            $table->string('url')
                ->unique()
                ->comment('url link eksternal');
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
        Schema::dropIfExists('links');
    }
};

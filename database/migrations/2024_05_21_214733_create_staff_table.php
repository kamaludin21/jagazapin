<?php

use App\Models\Position;
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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')
                ->comment('unique id');
            $table->foreignIdFor(User::class)
                ->constrained()
                ->cascadeOnDelete()
                ->comment('id table users');
            $table->foreignIdFor(Position::class)
                ->constrained()
                ->cascadeOnDelete()
                ->comment('id table position');
            $table->integer('order')
                ->nullable()
                ->default(1)
                ->index();
            $table->string('name')
                ->comment('nama');
            $table->string('title_front')
                ->nullable()
                ->comment('gelar depan');
            $table->string('title_back')
                ->nullable()
                ->comment('gelar belakang');
            $table->string('file')
                ->nullable()
                ->comment('gambar staff');
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
        Schema::dropIfExists('staff');
    }
};

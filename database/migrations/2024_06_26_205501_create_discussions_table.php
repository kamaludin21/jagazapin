<?php

use App\Models\User;
use App\Models\ComplaintCategory;
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
        Schema::create('discussions', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->foreignIdFor(User::class)
                ->nullable()
                ->constrained()
                ->cascadeOnDelete()
                ->comment('id table users');
            $table->foreignIdFor(ComplaintCategory::class)
                ->constrained()
                ->cascadeOnDelete()
                ->comment('id table complaint_categories');
            $table->string('token')
                ->nullable()
                ->unique()
                ->comment('token untuk mengakses pengaduan');
            $table->text('title')
                ->comment('judul');
            $table->longText('description')
                ->comment('deskripsi pengaduan');
            $table->timestamp('date')
                ->comment('tanggal kejadian]');
            $table->string('location')
                ->comment('tempat kejadian]');
            $table->string('attachment')
                ->nullable()
                ->comment('lampiran bukti');
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
        Schema::dropIfExists('discussions');
    }
};

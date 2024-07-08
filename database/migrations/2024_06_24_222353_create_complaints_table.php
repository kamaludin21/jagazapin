<?php

use App\Models\ComplaintCategory;
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
        Schema::create('complaints', function (Blueprint $table) {
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
                ->nullable()
                ->comment('deskripsi pengaduan');
            $table->timestamp('date')
                ->nullable()
                ->comment('tanggal kejadian');
            $table->string('location')
                ->nullable()
                ->comment('tempat kejadian');
            $table->json('attachment')
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
        Schema::dropIfExists('complaints');
    }
};

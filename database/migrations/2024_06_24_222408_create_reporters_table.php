<?php

use App\Models\Complaint;
use App\Models\ReporterCategory;
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
        Schema::create('reporters', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->foreignIdFor(Complaint::class)
                ->constrained()
                ->cascadeOnDelete()
                ->comment('id table complaints');
            $table->foreignIdFor(ReporterCategory::class)
                ->constrained()
                ->cascadeOnDelete()
                ->comment('id table complaint_categories');
            $table->string('name')
                ->nullable()
                ->comment('nama pelapor');
            $table->string('phone_number')
                ->nullable()
                ->comment('nomor telpon/hp');
            $table->string('email')
                ->nullable()
                ->comment('email]');
            $table->string('address')
                ->nullable()
                ->comment('alamat pelapor]');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reporters');
    }
};

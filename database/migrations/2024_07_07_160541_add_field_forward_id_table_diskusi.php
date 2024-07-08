<?php

use App\Models\Forward;
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
        Schema::table('discussions', function (Blueprint $table) {
            $table->foreignIdFor(Forward::class)
                ->nullable()
                ->constrained()
                ->cascadeOnDelete()
                ->comment('untuk status diksusi akan di terukan ke mana')
                ->after('complaint_category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('discussions', function (Blueprint $table) {
            //
        });
    }
};

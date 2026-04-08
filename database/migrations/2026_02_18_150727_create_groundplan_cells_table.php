<?php

use App\Models\StorageRoom;
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
        Schema::create('groundplan_cells', function (Blueprint $table) {
            $table->id();
            $table->integer('groundplan_id');
            $table->boolean('is_in_groundplan')->default(false);
            $table->integer('x_pos')->nullable();
            $table->integer('y_pos')->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->foreignIdFor(StorageRoom::class);
            $table->boolean('show_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groundplan_cells');
    }
};

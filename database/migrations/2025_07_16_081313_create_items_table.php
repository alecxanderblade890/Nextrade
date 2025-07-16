<?php

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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->text('description');
            $table->string('exchange_item_for')->nullable();
            $table->string('image_url');
            // Foreign key for the user
            // This is the column that links items to users
            $table->foreignId('user_id')
                  ->constrained() // This assumes 'users' table and 'id' column
                  ->onDelete('cascade');// Optional: If a user is deleted, their items are also deleted.
                                                // Other options: 'set null', 'restrict', 'no action'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};

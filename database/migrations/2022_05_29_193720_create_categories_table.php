<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('categories', static function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('background_color');
            $table->integer('tag_quantity')->nullable();
            $table->integer('storage_space_quantity')->nullable();
            $table->string('storage_space_unit')->nullable();
            $table->boolean('active')->default(true);
            $table->foreignId('created_by')->constrained('admins');
            $table->foreignId('updated_by')->constrained('admins');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};

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
    public function up()
    {
        Schema::create('tour_pages', function (Blueprint $table) {
            $table->id();
            $table->string('background_color');
            $table->text('image_url');
            $table->string('title');
            $table->text('subtitle');
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
    public function down()
    {
        Schema::dropIfExists('tour_pages');
    }
};

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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->uuid('reference_id');
            $table->string('label');
            $table->enum('contract_type', ['CDI', 'CDD', 'alternance', 'stage']);
            $table->string('job_type');
            $table->longText('description');
            $table->string('image');
            $table->enum('status', ['draft', 'published', 'updated']);
            $table->date('published_at');
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};

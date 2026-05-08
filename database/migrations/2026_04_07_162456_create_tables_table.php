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
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->integer('table_number')->unique();
            $table->timestamp('created_at')->useCurrent();
        });

        Schema::create('table_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('table_id')->references('id')->on('tables');
            $table->foreignId('session_id')->nullable()->refrences('id')->on('table_sessions');
            $table->enum('request_status',['approved','pending','rejected','cancelled'])->default('pending');
            $table->timestamp('made_at')->useCurrent();
            $table->timestamp('status_updated_at')->nullable();
            $table->foreignId('status_updated_by')->nullable()->constrained('restaurent_admins');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};

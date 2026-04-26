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
            $table->string('qr_code')->nullable();
            $table->enum('status',['available','occupied'])->default('available');
            $table->foreignId('status_updated_by')->references('id')->on('restaurent_admins')->nullable()->comment('FK restaurent_admins.id');
            $table->timestamp('status_updated_at')->nullable()->useCurrent();
        });

        Schema::create('table_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('table_number')->unique();
            $table->foreign('table_number')->references('table_number')->on('tables');
            $table->enum('request_status',['approved','pending'])->default('pending');
            $table->timestamp('made_at')->useCurrent();
            $table->timestamp('approved_at')->nullable()->useCurrent();
            $table->foreignId('approved_by')->references('id')->on('restaurent_admins')->nullable();
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

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
        Schema::create('restaurent_admins', function (Blueprint $table) {
            $table->id();
            $table->string('admin_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role',['administrator', 'waiter', 'kitchen']);
            $table->timestamp('creation_date')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurent_admins');
    }
};

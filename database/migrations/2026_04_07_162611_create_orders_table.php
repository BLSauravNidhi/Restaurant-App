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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('table_id')->comment('FK tables.id');
            $table->integer('session_id')->comment('FK table_sessions.id');
            $table->enum('status',['pending', 'prepairing', 'ready', 'served', 'paid', 'cancelled'])
                ->comment('pending, prepairing, ready, served, paid, cancelled');
            $table->decimal('total_amount', 10, 2);
            $table->text('notes')->nullable();
            $table->timestamp('orderd_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->comment('FK orders.id');
            $table->decimal('amount', 10, 2);
            $table->enum('method',['cash', 'upi', 'card'])->comment('cash, upi, card');
            $table->enum('status',['pending', 'compleated', 'failed'])->comment('pending, compleated, failed');
            $table->timestamp('status_updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

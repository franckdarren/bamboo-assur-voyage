<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_msisdn');
            $table->decimal('amount', 10, 2);
            $table->string('status')->default('created'); // created, pending, paid, failed
            $table->timestamp('paid_at')->nullable();
            $table->string('operator')->nullable();
            $table->string('transaction_id')->nullable();

            $table->foreignId('cotation_id')->nullable()->constrained('cotations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};

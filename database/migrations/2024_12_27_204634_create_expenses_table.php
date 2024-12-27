<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\ExpensePaymentMethodEnum;
use App\Enums\ExpenseStatusEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('category_id')->references('id')->on('expense_categories')->onDelete('cascade');
            $table->double('amount');
            $table->date('date');
            $table->string('payment_method')->default(ExpensePaymentMethodEnum::CASH);
            $table->string('status')->default(ExpenseStatusEnum::APPROVED);
            $table->string('description')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};

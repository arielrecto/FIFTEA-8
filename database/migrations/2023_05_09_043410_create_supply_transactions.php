<?php

use App\Models\Supply;
use App\Models\Transaction;
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
        Schema::create('supply_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Transaction::class);
            $table->foreignIdFor(Supply::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supply_transactions');
    }
};

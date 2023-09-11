<?php

use App\Models\Supply;
use App\Models\Type;
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
        Schema::create('supply_type', function (Blueprint $table) {
           $table->foreignIdFor(Supply::class);
           $table->foreignIdFor(Type::class);
           $table->string('price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supply_type');
    }
};

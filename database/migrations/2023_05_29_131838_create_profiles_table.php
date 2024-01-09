<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('image')->default('P123.jpg');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('first_name');
            $table->string('age');
            $table->string('sex');
            $table->string('phone');
            // $table->string('block');
            $table->string('lot');
            $table->string('street');
            $table->string('municipality');
            $table->string('barangay');
            $table->string('subdivision')->nullable();
            // $table->string('region');
            // $table->string('zip_code');
            $table->foreignIdFor(User::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};

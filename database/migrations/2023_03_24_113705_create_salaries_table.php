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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('salaries',function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->string('main_salary');
            $table->string('allowance');
            $table->string('bonus');
            $table->string('total');
            $table->timestamps();
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('visa_applications', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained()->cascadeOnDelete();
      $table->string('visa_type');
      $table->string('purpose')->nullable();
      $table->date('arrival_date')->nullable();
      $table->unsignedInteger('duration_days')->nullable();
      $table->string('status')->default('draft'); 
      $table->string('reference_no')->unique();
      $table->decimal('fee_amount', 10, 2)->default(0);
      $table->string('payment_status')->default('unpaid'); 
      $table->timestamps();
    });
  }
  public function down(): void {
    Schema::dropIfExists('visa_applications');
  }
};

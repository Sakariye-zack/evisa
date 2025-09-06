<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('documents', function (Blueprint $t) {
      $t->id();
      $t->foreignId('visa_application_id')->constrained()->cascadeOnDelete();
      $t->string('type'); // passport, photo, support
      $t->string('file_path');
      $t->foreignId('verified_by')->nullable()->constrained('users');
      $t->timestamp('verified_at')->nullable();
      $t->timestamps();
    });
  }
  public function down(): void {
    Schema::dropIfExists('documents');
  }
};

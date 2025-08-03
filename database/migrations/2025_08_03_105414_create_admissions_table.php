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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('class_id')
                ->constrained('school_classes')
                ->onDelete('cascade');

            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->enum('shift', ['morning', 'day']); // unified case

            $table->date('admission_date');
            $table->date('birthday');

            $table->enum('blood_group', [
                'A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'
            ])->nullable();

            $table->string('student_phone')->nullable();
            $table->string('student_email')->nullable();
            $table->string('religion')->nullable();

            $table->text('present_address');
            $table->text('permanent_address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();

            $table->string('student_photo');
            // Previous School  name
            $table->string('school_name')->nullable();

            $table->string('guardian_name');
            $table->string('guardian_phone');
            $table->string('guardian_photo');

            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};

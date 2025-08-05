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
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->string('class');

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->enum('shift', ['morning', 'day']); // unified case

            $table->date('admission_date')->nullable();
            $table->date('birthday')->nullable();

            $table->enum('blood_group', [
                'A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'
            ])->nullable();

            $table->string('student_phone')->nullable();
            $table->string('student_email')->nullable();
            $table->string('religion')->nullable();

            $table->text('present_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();

            $table->string('student_photo')->nullable();
            // Previous School  name
            $table->string('school_name')->nullable();

            $table->string('guardian_name')->nullable();
            $table->string('guardian_phone')->nullable();
            $table->string('guardian_photo')->nullable();


            $table->string('section')->nullable(); // Section A or B
            $table->string('student_group')->nullable(); // Science, Arts, or Business
            $table->tinyInteger("status")->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

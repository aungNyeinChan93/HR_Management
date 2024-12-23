<?php

use App\Models\Department;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('employee_id')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('nrc_number')->unique()->nullable();
            $table->text('address')->nullable();
            $table->date('birthday')->nullable();
            $table->enum("gender", ['male', 'famale'])->nullable();
            $table->string('profile_image')->nullable();
            $table->foreignIdFor(Department::class, 'department_id')->default('1');
            $table->date('date_of_join')->nullable();
            $table->boolean('is_active')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone', 'nrc_number', 'address',
                 'birthday', 'gender', 'profile_image',
                 'employee_id', 'department_id', 'date_of_join', 'is_active']
                );
        });
    }
};

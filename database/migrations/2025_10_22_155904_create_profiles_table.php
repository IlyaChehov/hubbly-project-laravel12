<?php

use App\Models\Profile;
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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->date('birthed_at')->nullable();
            $table->boolean('id_married')->nullable();
            $table->unsignedTinyInteger('gender')->default(Profile::GENDER_NOT_SPECIFIED);
            $table->foreignId('user_id')
                ->index()
                ->unique()
                ->constrained('users');
            $table->timestamps();
            $table->softDeletes();
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

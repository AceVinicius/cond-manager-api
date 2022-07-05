<?php

use App\Models\User;
use App\Models\Wall;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wall_likes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Wall::class)->constrained('walls')->cascadeOnUpdate();
            $table->foreignIdFor(User::class)->constrained('users')->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wall_likes');
    }
};

<?php

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
        Schema::create('lost_n_founds', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['LOST', 'FOUND']);
            $table->string('photo');
            $table->string('description');
            $table->string('where');
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
        Schema::dropIfExists('lost_n_founds');
    }
};

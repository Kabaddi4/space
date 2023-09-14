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
        //
        Schema::create('space', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role');
            $table->string('element');
            $table->integer('attack');
            $table->double('damage_parsent', 3, 1);
            $table->double('crit_rate', 2, 1);
            $table->double('crit_damage', 3, 1);
            $table->string('image_path')->nullable();
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
        //モデル名記載
        Schema::dropIfExists('space');
    }
};

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
        Schema::create('a_p_i_s', function (Blueprint $table) {
            $table->id();
            $table->string('Cur_Abbreviation', 45)->nullable('false');
            $table->integer('Cur_Scale')->nullable('false');
            $table->string('Cur_Name', 45)->nullable('false');
            $table->integer('Cur_OfficialRate')->nullable('false');
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
        Schema::dropIfExists('a_p_i_s');
    }
};

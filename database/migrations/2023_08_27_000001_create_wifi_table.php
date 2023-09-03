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
        Schema::create('wifi', function (Blueprint $table) {
            $table->id('id_wifi')->nullable(false);
            $table->string('nama', 100)->nullable();
            $table->string('type', 100)->nullable();
            $table->text('catatan')->nullable();
            $table->string('password', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};

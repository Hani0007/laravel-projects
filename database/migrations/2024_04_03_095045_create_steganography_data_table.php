<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSteganographyDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('steganography_data', function (Blueprint $table) {
            $table->id();
            $table->text('cover_text');
            $table->text('secret_message');
            $table->text('encoded_text');
            $table->string('password'); // Add the password field
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
        Schema::dropIfExists('steganography_data');
    }
}

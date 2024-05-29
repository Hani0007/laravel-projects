<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPasswordToSteganographyDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('steganography_data', function (Blueprint $table) {
            $table->string('password'); // Define the password field
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('steganography_data', function (Blueprint $table) {
            $table->dropColumn('password'); // Drop the password field
        });
    }
}

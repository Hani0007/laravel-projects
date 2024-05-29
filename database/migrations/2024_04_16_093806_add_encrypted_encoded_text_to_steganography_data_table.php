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
        Schema::table('steganography_data', function (Blueprint $table) {
            $table->text('encrypted_encoded_text')->nullable();
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
            $table->dropColumn('encrypted_encoded_text');
        });
    }
};
?>
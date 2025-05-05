<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToDetailMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_mahasiswa', function (Blueprint $table) {
            
            $table->string('nama');
            $table->string('nim');
            $table->string('alamat');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_mahasiswa', function (Blueprint $table) {
            $table->dropColumn(['nama', 'nim', 'alamat']);
        });
    }
}

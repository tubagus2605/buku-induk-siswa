<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('nisn', 10)->unique();
        $table->string('nis')->unique();
        $table->string('nama_lengkap');
        $table->enum('jenis_kelamin', ['L', 'P']);
        $table->string('email')->unique();
        $table->string('password');
        $table->string('role')->default('siswa');
        $table->string('foto')->nullable();
        $table->foreignId('tahun_ajar_id')->nullable()->constrained('tahun_ajar');
        $table->foreignId('kelas_id')->nullable()->constrained('kelas');
        $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

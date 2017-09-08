<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('jurusan');
            $table->integer('angkatan');
            $table->text('alamat');
            $table->string('kotakab');
            $table->string('propinsi');
            $table->integer('kodepos');
            $table->integer('telepon');
            $table->integer('nohp');
            $table->string('avatar');
            $table->integer('status')->default(0);
            $table->integer('is_admin')->default(0);
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
        Schema::drop('users');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKomentarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Komentar', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('video_id');
            $table->string('user_id');
            $table->string('nama_user');
            $table->string('nomorinduk');
            $table->text('body');
            $table->string('avatar');
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
        Schema::dropIfExists('Komentar');
    }
}
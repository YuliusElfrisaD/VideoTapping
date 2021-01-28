<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomorinduk');
            $table->string('username');
            $table->string('status');
            $table->string('mapel');
            $table->string('title');
            $table->string('judulvideo');
            $table->string('format');
            $table->string('deskripsi')->nullable();
            $table->string('sizevideo');
            $table->string('thumbnail');
            $table->integer('views')->default('0');
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
        Schema::dropIfExists('video');
    }
}
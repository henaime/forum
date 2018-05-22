<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->addColumn('integer', 'iduser', ['unsigned' => true, 'length' => 11]);
            $table->addColumn('integer', 'idpost', ['unsigned' => true, 'length' => 11]);
            $table->foreign('iduser')->references('id')->on('users');
            $table->foreign('idpost')->references('id_p')->on('posts');
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
        Schema::dropIfExists('likes');
    }
}

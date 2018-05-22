<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->addColumn('integer', 'id_us', ['unsigned' => true, 'length' => 11]);
            $table->addColumn('integer', 'id_po', ['unsigned' => true, 'length' => 11]);
            $table->mediumText('contenu');
            $table->foreign('id_po')->references('id_p')->on('posts');
            $table->foreign('id_us')->references('id')->on('users');
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
        Schema::dropIfExists('comments');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            /* $table->unsignedBigInteger('post_id'); 2 qatorr urniga 1 qator
            $table->foreign('post_id')->references('id')->on('posts'); */
            $table->foreignId('post_id')->constrained()->onDelete('cascade');

            $table->foreignid('user_id')->constrained();
            $table->text('body');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
};

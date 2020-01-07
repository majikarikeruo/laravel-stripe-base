<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->comment('イベントタイトル');
            $table->string('description')->comment('イベント内容');
            $table->bigInteger('capacity')->comment('定員');
            $table->bigInteger('price')->comment('料金');
            $table->string('place')->comment('place');
            $table->string('notice')->comment('注意書き');
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
        Schema::dropIfExists('lessons');
    }
}

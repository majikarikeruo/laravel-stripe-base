<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterestUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interest_user', function (Blueprint $table) {


            /*

            多対多のため、interestテーブルとuserテーブルの中間テーブルになるものを作成。
            中間テーブルの値は、親テーブルの特定の値と一致するものである。
            そのため、型を揃えるなどの意識が必要。

            unsignedIntegerを使用するのは、大抵親テーブルのidを参照するときは
            increments('id')となっているのがほとんどだが、incrementsで生成されるのが
            INT(10) unsigned　などになるから。
            UNSIGNEDは符号なしという意味。わかりやすい例でいうと-（マイナス）をつける
            必要がないものはUNSIGNEDにすべき。

            */
            $table->unsignedBigInteger('interest_id');
            $table->unsignedBigInteger('user_id');
            $table->primary(['interest_id', 'user_id']);


            $table->foreign('interest_id')
                ->references('id')
                ->on('interests')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interest_user');
    }
}

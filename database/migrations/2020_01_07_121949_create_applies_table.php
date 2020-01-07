<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('customer_id')->comment('顧客ID');
            $table->bigInteger('schedule_id')->comment('参加日程ID');
            $table->bigInteger('status')->comment('申し込み状況。1：申し込み。2:入金確認前。3：入金確認済。4：キャンセル済');
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
        Schema::dropIfExists('applies');
    }
}

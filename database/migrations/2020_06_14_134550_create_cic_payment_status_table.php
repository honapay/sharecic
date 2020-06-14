<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCicPaymentStatuusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cic_payment_status', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id'); //ユーザーID
            $table->integer('file_id'); //クレジット情報ID
            $table->integer('year'); //年
            $table->integer('month'); //月
            $table->enum('value',['$','P','R'.'A','B','C','-',' ']); //内容
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
        Schema::dropIfExists('cic_payment_status');
    }
}

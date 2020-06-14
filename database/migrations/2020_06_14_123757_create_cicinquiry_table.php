<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCicinquiryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cicinquiry', function (Blueprint $table) {
            $table->increments('id'); //データID
            $table->integer('user_id'); //ユーザーID
            $table->enum('data_type',['apply','use']); //情報区分(申込、利用)
            $table->integer('issuerId'); //1.登録元会社ID
            $table->string('issuerName'); //1.登録元会社名
            $table->date('holdUntil'); //2.保有期限
            $table->dateTime('inquiry_dateTime'); //照会日時(申込->8.,利用->5.)
            
            // columns for application
            $table->integer('phoneId_1'); //6.電話番号ID(1)
            $table->integer('phoneId_2'); //7.電話番号ID(2)
            $table->integer('addressId'); //5.住所ID 
            $table->enum('applyInquiryType',['契約者','保証人']); //9.照会区分
            $table->enum('applycontractType',['カード等','個品割賦','リース','保証契約','無保証融資','保証融資','住宅ローン']); //10.申込区分
            $table->integer('applyAmount'); //11.契約予定額
            $table->ingeger('applyCounts'); //12.支払予定回数
            $table->integer('applyProductTypeId_1'); //13.商品名(1)ID
            $table->integer('applyProductTypeId_2'); //14.商品名(2)ID
            $table->integer('applyProductTypeId_3'); //15.商品名(3)ID
            $table->integer('applyProdcutTypeId_4'); //16.商品名(4)ID
            $table->string('applyLength_1'); //17. 数量・回数・期間(1)
            $table->string('applyLength_2'); //18. 数量・回数・期間(2)
            $table->string('applyLength_3'); //19. 数量・回数・期間(3)
            
            // columns for use
            $table->enum('usePurpose',['消費者対応','新規再照会','途上与信','法定途上与信','配偶者再照会','再照会']); //6.利用目的
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
        Schema::dropIfExists('cicinquiry');
    }
}

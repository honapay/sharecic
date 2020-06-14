<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCiccreditTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciccredit', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            //任意登録項目
            $table->string('user_card_name'); //カード名
            $table->string('user_comment'); //ユーザー入力コメント
            //属性
            $table->integer('issuerId'); //1.登録元会社ID
            $table->string('issuerName'); //1.登録元会社名
            $table->date('holdUntil'); //2.保有期限
            $table->integer('userPhoneId_1'); //6.電話番号ID(1)
            $table->integer('userPhoneId_2'); //6.電話番号ID(2)
            $table->integer('userAddressId'); //7.住所ID
            $table->integer('userJobId'); //8,9.勤務先ID
            $table->enum('identityDocument_1',['運転免許証','パスポート','外国人登録証','健康保険証','その他公的資料']); //10.公的資料ID(1)
            $table->date('identityDocumentCheckDate_1'); //10.公的資料確認日(1)
            $table->enum('identityDocument_2',['運転免許証','パスポート','外国人登録証','健康保険証','その他公的資料']); //10.公的資料ID(2)
            $table->date('identityDocumentCheckDate_2'); //10.公的資料確認日(2)
            $table->integer('userPartnerId'); //11.配偶者名ID
            //契約内容
            $table->enum('contractBy',['本人','保証人']); //12.契約の種類
            $table->enum('contractType',['カード等','個品割賦','リース','補償契約','無保証融資','保証融資','住宅ローン','移管債権']); //13.契約の内容
            $table->date('contractStartDate'); //14.契約年月日
            $table->date('contractEndDate'); //15.契約終了予定日
            $table->integer('installmentCounts'); //16.支払回数
            $table->integer('contractAmount'); //17.契約金額
            $table->integer('creditLimit'); //18.極度額
            $table->boolean('creditLimitIsN'); //18.極度額(N埋めフラグ)
            $table->integer('loanLimit'); //18.極度額(内ｷｬｯｼﾝｸﾞ枠)
            $table->boolean('loanLimitIsN'); //18.極度額(内ｷｬｯｼﾝｸﾞ枠のN埋めフラグ)
            $table->integer('productId_1'); //19.商品名1
            $table->string('productLength_1'); //19.商品名1(数量・回数・期間)
            $table->integer('productId_2'); //20.商品名2
            $table->string('productLength_2'); //20.商品名2(数量・回数・期間)
            $table->integer('productId_3'); //21.商品名3
            $table->string('productLength_3'); //21.商品名3(数量・回数・期間)
            //お支払いの状況
            $table->date('reportDate'); //22.報告日
            $table->integer('billAmount'); //23.請求額
            $table->integer('paidAmount'); //24.入金額
            $table->integer('debtAmount'); //25.残債額
            $table->integer('loanDebtAmount'); //25.残債額(内ｷｬｯｼﾝｸﾞ残債額)
            $table->boolean('paymentStatus'); //26.返済状況(trueで異動)
            $table->date('irregularStartDate'); //(異動発生日)
            $table->enum('progressStatus',['更新停止','支払条件変更','支払総額変更']); //27.経過状況
            $table->date('progressStartDate'); //(経過状況発生日)
            $table->enum('addendumStatus',['法的手続','解消']); //28.補足内容
            $table->date('irregularEndDate'); //(延滞解消日)
            $table->integer('warrantyIssuedAmount'); //29. 保証履行額
            $table->integer('progressAmount'); //30.金額(経過状況,終了状況に対応するもの)
            $table->enum('finishStatus',['完了','本人以外弁済','貸倒','移管終了','法定免責']); //31.終了状況

            //割賦販売法登録内容(isaHogehoge)
            //Data based on Installment Sales Act
            $table->integer('isaDebtAmount'); //32.割賦残債額
            $table->integer('isaYearlyBill'); //33.年間請求予定額
            $table->enum('isaIrregularStatus',['元本手数料','手数料のみ','元本のみ','遅延解消']); //34.支払遅延有無
            $table->date('isaIrregularStartDate'); //遅延発生日
            $table->date('isaIrregularEndDate'); //遅延解消日

            //貸金業法登録内容(mlbaHogehoge)
            //Data based on Money Lending Business Act
            $table->date('mlbaAsOfDate'); //35.確定日
            $table->integer('mlbaDebtAmount'); //36.残高
            $table->integer('mlbaLoanDebtAmount'); //(内ｷｬｯｼﾝｸﾞ残高)
            $table->integer('mlbaContractAmount'); //37.契約額
            $table->integer('mlbaCreditLimit'); //38.極度額
            $table->boolean('mlbaCreditLimitIsN'); //N埋めフラグ
            $table->integer('mlbaLoanCreditLimit'); //(内ｷｬｯｼﾝｸﾞ枠)
            $table->boolean('mlbaLoanCreditLimitIsN'); //N埋めフラグ
            $table->string('mlbaProductName'); //39.商品名
            $table->date('mlbaRecentLendDate'); //40.貸付日
            $table->integer('mlbaTotalAsOfRecentLend'); //41.貸付額
            $table->integer('mlbaRecentLendAmount'); //42.出金額
            $table->date('mlbaRecentPaymentDate'); //43.最新支払日
            $table->date('mlbaNextPaymentDate'); //44. 次回支払予定日
            $table->enum('mlbaIrregularStatus',['元本利息','利息のみ','元本のみ']); //45.遅延有無
            $table->boolean('mlbaCollateral'); //46. 担保(true=有)
            $table->boolean('mlbaGuarantor'); //46. 保証人(true=有)
            $table->enum('mlbaFinishStatus',['完了','移管終了','本人以外弁済','法定免責']); //47.終了状況

            //コメント
            $table->enum('cicComment',[
                '18歳以下に発生した延滞のため十分ご留意ください',
                '20歳未満に発生した延滞のためご留意ください',
                '支払停止の抗弁により登録会員が内容を確認中です',
                '災害地域のため通常更新が行われない場合があります',
                '災害救助法適用地域です'
            ]);
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
        Schema::dropIfExists('ciccredit');
    }
}

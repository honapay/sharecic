<?php

use Illuminate\Database\Seeder;

class InquiryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cicinquiry')->insert([
            [
                'user_id' => 1,
                'data_type'=> 'apply',
                'issuerId' => 99661,
                'issuerName' => '株式会社ジェーシービー',
                'holdUntil'=> '2020-08-31',
                'inquiry_dateTime' => '20200305155628',
                'phoneId_1'=> 1,
                'phoneId_2'=>null,
                'addressId'=>1,
                'applyInquiryType'=>'契約者',
                'applycontractType'=>'カード等',
                'applyAmount'=>0,
                'applyCounts'=>0,
                'applyProductType_1'=> 'キャッシング付',
            ]
        ]);
    }
}

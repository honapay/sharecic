<?php

use Illuminate\Database\Seeder;

class IssuersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('issuers')->insert([
            [
                'issuer_id'=>99663,
                'name'=>'三井住友カード株式会社',
            ]
        ]);
    }
}

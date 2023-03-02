<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// 追加※DBファサードをuse
use Illuminate\Support\Facades\DB;

class SampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 追加※3つのレコードを作成
        DB::table('samples')->insert(
            [
                [
                    'name' => '田中',
                    'age' => 20,
                ],
                [
                    'name' => '山田',
                    'age' => 30,
                ],
                [
                    'name' => '佐藤',
                    'age' => 40,
                ],
            ]
        );
    }
}

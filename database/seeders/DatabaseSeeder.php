<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\SampleSeeder;
// 追加※Sampleモデルを読み込み
use App\Models\Sample;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            JobSeeder::class,
            SampleSeeder::class,
            UsersTableSeeder::class,
            TweetsTableSeeder::class,
            CommentsTableSeeder::class,
            FavoritesTableSeeder::class,
            FollowersTableSeeder::class,
        ]);
        // 追加※Sampleモデルのファクトリメソッドを実行。
        Sample::factory()->count(10)->create();
    }
}

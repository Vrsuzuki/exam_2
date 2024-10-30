<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $param = [
           'content' => '商品のお届けについて',
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now()];
        DB::table('categories')->insert($param);

        $param = [
           'content' => '商品の交換について',
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now()];
        DB::table('categories')->insert($param);

        $param = [
           'content' => '商品トラブル',
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now()];
        DB::table('categories')->insert($param);

        $param = [
           'content' => 'ショップへのお問い合わせ',
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now()];
        DB::table('categories')->insert($param);

        $param = [
            'content' => 'その他',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()];
         DB::table('categories')->insert($param);
    }
}

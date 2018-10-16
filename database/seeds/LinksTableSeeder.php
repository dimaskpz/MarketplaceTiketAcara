<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('links')->insert([
          [
            'user_id' => '1',
            'acara_id' => '1',
            'link' => 'AbCDe',
          ],

          [
            'user_id' => '2',
            'acara_id' => '1',
            'link' => 'XXxxSS',
          ],

          [
            'user_id' => '3',
            'acara_id' => '1',
            'link' => 'ppKKhG',
          ],
        ]);
    }
}

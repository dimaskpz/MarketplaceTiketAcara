<?php

use Illuminate\Database\Seeder;

class TransaksisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaksis')->insert([

          [
            'id' => '1',
            'link_id' => '2',
            'acara_id' => '1',
            'nama' => 'dimas',
            'email' => 'dimaskpz',
            'tlp' => '08845747754',
            'ispaid' => 'n',
          ],

          [
            'id' => '2',
            'link_id' => '2',
            'acara_id' => '1',
            'nama' => 'budi',
            'email' => 'bwijaya@gmail.com',
            'tlp' => '0848538454',
            'ispaid' => 'n',
          ],
        ]);
    }
}

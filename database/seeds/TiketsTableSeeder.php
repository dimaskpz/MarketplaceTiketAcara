<?php

use Illuminate\Database\Seeder;

class TiketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tikets')->insert([
          [
            'id' => '1',
            'no_tiket' => '1',
            'dtransaksi_id' => '1',
            'nama' => 'Budi Wijaya',
            'email' => 'bwijaya@gmail.com',
            'tlp' => '08453745345',
            'tgl_lahir' => '1997-10-11',
            'jenis_kelamin' => 'L',
            'no_ktp' => '94587234570247534',
          ],

          [
            'id' => '2',
            'no_tiket' => '2',
            'dtransaksi_id' => '1',
            'nama' => 'Okto',
            'email' => 'okto@gmail.com',
            'tlp' => '084537543757',
            'tgl_lahir' => '1997-10-11',
            'jenis_kelamin' => 'L',
            'no_ktp' => '039458923475873485',
          ],

          [
            'id' => '3',
            'no_tiket' => '3',
            'dtransaksi_id' => '2',
            'nama' => 'Kevin Razak',
            'email' => 'Krazak@gmail.com',
            'tlp' => '084665645647',
            'tgl_lahir' => '1997-10-11',
            'jenis_kelamin' => 'L',
            'no_ktp' => '4578374582748573845',
          ],

        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class DtransaksisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dtransaksis')->insert([
          [
            'id' => '1',
            'transaksi_id' => '1',
            'produk_id' => '1',
            'jumlah' => '3',
          ],

          [
            'id' => '2',
            'transaksi_id' => '1',
            'produk_id' => '2',
            'jumlah' => '2',
          ],

          [
            'id' => '3',
            'transaksi_id' => '2',
            'produk_id' => '2',
            'jumlah' => '2',
          ],

        ]);
    }
}

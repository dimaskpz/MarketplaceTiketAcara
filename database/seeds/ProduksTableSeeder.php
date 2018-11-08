<?php

use Illuminate\Database\Seeder;

class ProduksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produks')->insert([
          [
            'id' => '1',
            'acara_id' => '1',
            'nama' => 'Regular',
            'harga' => '30000',
            'jumlah' => '30',
            'deskripsi' => 'tiket untuk harga normal',
            'tgl_selesai' => '2018-09-08',
            'komisi_jenis' => 'tetap',
            'komisi_tetap' => '10000',
            'komisi_persen' => '0',

          ],

          [
            'id' => '2',
            'acara_id' => '1',
            'nama' => 'VIP',
            'harga' => '70000',
            'jumlah' => '20',
            'deskripsi' => 'Posisi tempat duduk yang lebih dekat dengan pembicara',
            'tgl_selesai' => '2018-09-012',
            'komisi_jenis' => 'tetap',
            'komisi_tetap' => '10000',
            'komisi_persen' => '0',
          ]

        ]);
    }
}

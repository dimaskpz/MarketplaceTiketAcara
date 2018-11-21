<?php

use Illuminate\Database\Seeder;

class AcarasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('acaras')->insert([
          [
            'id' => '1',
            'user_id' => '1',
            'gambar' => 'ddsfs/sdfsdf/ssdsd',
            'nama' => 'Membangun Generasi Muda',
            'nama_tempat' => 'UC Hall',
            'alamat' => 'Made 878, sawahan',
            'kota' => 'Surabaya',
            // 'kapasitas' => '50',
            // 'jenis_acara' => 'Umum',
            'tgl_mulai' => '2014-06-19',
            'tgl_selesai' => '2014-06-19',
            'wkt_mulai' => '07:15:00',
            'wkt_selesai' => '07:15:00',
            'deskripsi' => 'Ini adalah acara untuk kita semua sehingga kita mampu membangun generasi muda yang dapat membawa bangsa ini ke tahap yang indah',
          ],

          [
            'id' => '2',
            'user_id' => '1',
            'gambar' => 'ddsfs/sdfsdf/sddsdsd',
            'nama' => 'Bangkitkan Rasa Nasional Kita',
            'nama_tempat' => 'Tunjungan Plaza 5',
            'alamat' => 'Jln Tunjungan',
            'kota' => 'Surabaya',
            // 'kapasitas' => '100',
            // 'jenis_acara' => 'Khusus',
            'tgl_mulai' => '2018-06-19',
            'tgl_selesai' => '2018-09-20',
            'wkt_mulai' => '07:15:00',
            'wkt_selesai' => '07:15:00',
            'deskripsi' => 'Ini adalah acara untuk kita semua sehingga kita mampu membangun generasi muda yang dapat membawa bangsa ini ke tahap yang indah',
          ],

          // [
          //   'id' => '3',
          //   'user_id' => '2',
          //   'nama' => '',
          //   'kapasitas' => '',
          //   'jenis_acara' => '',
          //   'tgl_mulai' => '',
          //   'tgl_selesai' => '',
          //   'wkt_mulai' => '',
          //   'wkt_selesai' => '',
          //   'deskripsi' => '',
          // ],

        ]);
    }
}

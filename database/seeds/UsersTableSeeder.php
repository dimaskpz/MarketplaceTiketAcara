<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          [
              'id' => '1',
              'name' => 'Marcia',
              'tlp' => '0854835848583',
              'email' => 'ciananda7@gmail.com',
              'password' => bcrypt('123123'),
              'logo' => '',
              'alamat' => 'Jl. Tidar 577',
              'nama_perusahaan' => 'EO Peace',
              'nama_rekening' => 'Marcia',
              'nomor_rekening' => '34793748378438',
          ],

          [
            'id' => '2',
            'name' => 'Dimas',
            'tlp' => '0854835848583',
            'email' => 'dimaskpz@gmail.com',
            'password' => bcrypt('123123'),
            'logo' => '',
            'alamat' => 'Jl. Tidar 577',
            'nama_perusahaan' => 'EO Peace',
            'nama_rekening' => 'Dimas Kurnia Pratama',
            'nomor_rekening' => '3479333748378438',
          ],

          [
            'id' => '3',
            'name' => 'Budi',
            'tlp' => '0854835848583',
            'email' => 'budi@ex.com',
            'password' => bcrypt('123123'),
            'logo' => '',
            'alamat' => 'Jl. Tidar 577',
            'nama_perusahaan' => 'EO Peace',
            'nama_rekening' => 'Budi Wijaya',
            'nomor_rekening' => '34333793748378438',
          ],
      ]);
    }
}

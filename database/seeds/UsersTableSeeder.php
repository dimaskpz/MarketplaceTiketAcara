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
              'email' => 'ciananda7@gmail.com',
              'password' => bcrypt('123123'),
          ],

          [
            'id' => '2',
            'name' => 'Dimas',
            'email' => 'dimaskpz@gmail.com',
            'password' => bcrypt('123123'),
          ],

          [
            'id' => '3',
            'name' => 'Budi',
            'email' => 'budi@ex.com',
            'password' => bcrypt('123123'),
          ],
      ]);
    }
}

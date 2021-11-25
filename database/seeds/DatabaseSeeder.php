<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->assertDatabaseHas('users', [
            'email' => 'sally@example.com',
            'ssn' => 11,
            'password' => 'sallyaOMO;Alm;a',
            'category' => 'asdasdpsakp',
            'url' => 'sallyasdpsad',
            'rate' => 4,
            'name' => 'assa'
        ]);
    }
}

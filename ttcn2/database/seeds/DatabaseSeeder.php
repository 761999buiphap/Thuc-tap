<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $this->call(userSeeder::class);
    }
}
class userSeeder extends Seeder
{
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            'name'=>'Phu',
            'email'=>'phu12@gmail.com',
            'password'=>'12345678',
        ]);
    }
}

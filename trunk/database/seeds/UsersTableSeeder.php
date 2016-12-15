<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'name' => 'Admin',
            'surname' => 'Admin',
            'email' => 'admin@admin',
            'password' => Hash::make('admin'),
            'city' => 'Krakow',
            'address' => 'Czarnowiejska 1',
            'phone' => '012345678',
            'activated' => '1',
        ]);

        User::create([
            'name' => 'Tester',
            'surname' => 'Testowy',
            'email' => 'test@test',
            'password' => Hash::make('test'),
            'city' => 'Warszawa',
            'address' => 'Wiejska 1',
            'phone' => '876543210',
            'activated' => '1',
        ]);
    }
}
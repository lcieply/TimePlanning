<?php

use Illuminate\Database\Seeder;

class MeetingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meetings')->delete();

        DB::table('meetings')->insert([[
            'user_id' => '1',
            'user2_id' => '2',
            'allday' => true,
            'start_time' => '2017-01-06',
            'end_time' => '2017-01-06',
            'private' => false,
        ], [
            'user_id' => '1',
            'user2_id' => '2',
            'allday' => true,
            'start_time' => '2017-01-23',
            'end_time' => '2017-01-23',
            'private' => true,
        ]]);
    }
}

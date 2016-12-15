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
            'start_time' => '2016-12-23',
            'end_time' => '2016-12-23',
            'private' => false,
        ], [
            'user_id' => '1',
            'user2_id' => '2',
            'allday' => true,
            'start_time' => '2016-12-29',
            'end_time' => '2016-12-29',
            'private' => true,
        ]]);
    }
}

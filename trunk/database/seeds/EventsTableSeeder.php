<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->delete();

        DB::table('events')->insert([[
            'user_id' => '1',
            'title' => 'Public event',
            'description' => 'Public event',
            'allday' => true,
            'start_time' => '2017-01-10',
            'end_time' => '2017-01-10',
            'private' => false,
        ], [
            'user_id' => '1',
            'title' => 'Private event',
            'description' => 'Private event',
            'allday' => true,
            'start_time' => '2017-01-20',
            'end_time' => '2017-01-20',
            'private' => true,
        ], [
            'user_id' => '2',
            'title' => 'Public event',
            'description' => 'Public event',
            'allday' => true,
            'start_time' => '2017-01-17',
            'end_time' => '2017-01-17',
            'private' => false,
        ], [
            'user_id' => '2',
            'title' => 'Private event',
            'description' => 'Private event',
            'allday' => true,
            'start_time' => '2017-01-27',
            'end_time' => '2017-01-27',
            'private' => true,
        ]]);
    }
}

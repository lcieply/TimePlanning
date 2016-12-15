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
            'name' => 'Public event',
            'title' => 'Public event',
            'allday' => true,
            'start_time' => '2016-12-15',
            'end_time' => '2016-12-15',
            'private' => false,
        ], [
            'user_id' => '1',
            'name' => 'Private event',
            'title' => 'Private event',
            'allday' => true,
            'start_time' => '2016-12-18',
            'end_time' => '2016-12-18',
            'private' => true,
        ], [
            'user_id' => '2',
            'name' => 'Public event',
            'title' => 'Public event',
            'allday' => true,
            'start_time' => '2016-12-17',
            'end_time' => '2016-12-17',
            'private' => false,
        ], [
            'user_id' => '2',
            'name' => 'Private event',
            'title' => 'Private event',
            'allday' => true,
            'start_time' => '2016-12-20',
            'end_time' => '2016-12-20',
            'private' => true,
        ]]);
    }
}

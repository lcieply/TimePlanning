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

        DB::table('events')->insert([
            'user_id' => '1',
            'name' => 'Sample event',
            'title' => 'Sample event',
            'start_time' => '2016-12-06',
            'end_time' => '2016-12-06',
        ]);
    }
}

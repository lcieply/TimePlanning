<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('user2_id')->unsigned();
            $table->boolean('allday')->default(false);
            $table->dateTime('start_time');
            $table->dateTime('end_time')->nullable();
            $table->boolean('private')->default(true);
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('user2_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });

        DB::unprepared('
            CREATE TRIGGER `add_second_to_meeting` BEFORE INSERT ON `meetings`
            FOR EACH ROW
            SET NEW.start_time = DATE_ADD(NEW.start_time, INTERVAL 1 SECOND)
        ');

        DB::unprepared('
            CREATE TRIGGER `add_second_to_updated_meeting` BEFORE UPDATE ON `meetings`
            FOR EACH ROW
            SET NEW.start_time = DATE_ADD(NEW.start_time, INTERVAL 1 SECOND)
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `add_second_to_meeting`');
        DB::unprepared('DROP TRIGGER `add_second_to_updated_meeting`');
        Schema::dropIfExists('meetings');
    }
}

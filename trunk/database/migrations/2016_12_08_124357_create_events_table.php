<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title', 50);
            $table->string('description', 100);
            $table->boolean('allday')->default(false);
            $table->dateTime('start_time');
            $table->dateTime('end_time')->nullable();
            $table->boolean('private')->default(true);
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });

        DB::unprepared('
            CREATE TRIGGER `add_second_to_event` BEFORE INSERT ON `events`
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
        DB::unprepared('DROP TRIGGER `add_second_to_event`');
        Schema::dropIfExists('events');
    }
}

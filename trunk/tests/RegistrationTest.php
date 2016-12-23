<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegistrationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testNewUserRegistration()
    {
        $this->visit('/register')
            ->type('Jan', 'name')
            ->type('Nowak','surname')
            ->type('jannowak@gmail.com','email')
            ->type('janekzlasu123','password')
            ->type('janekzlasu123','password_confirmation')
            ->type('Radom','city')
            ->type('Warszawska 23','address')
            ->type('345234234','phone')
            ->press('Register')
            ->seePageIs('/login');


    }
    public function testExample()
    {
        $this->assertTrue(true);
    }
}

<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserRegistrationTest extends TestCase
{

    public function testNewUserRegistration()
    {
        $this->visit('/register')
            ->type('Jan', 'name')
            ->type('Nowak', 'surname')
            ->type('example@gmail.com', 'email')
            ->type('janekzlasu123', 'password')
            ->type('janekzlasu123', 'password_confirmation')
            ->type('Radom', 'city')
            ->type('Warszawska 23', 'address')
            ->type('345234234', 'phone')
            ->press('Register')
            ->see('Register')
            ->seeInDatabase('users', ['email' => 'example@gmail.com']);

    }

    public function testExample()
    {
        $this->assertTrue(true);
    }
}

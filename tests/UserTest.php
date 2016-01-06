<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        //test the unauthentication first to avoid the token generated by next assert

        //get authenticated user without authentication
        $this->get('/api/authenticate/user')
            ->dontSeeJsonKey('user')
            ->seeJsonValue('token_not_provided');

        //get all user without authentication
        $this->get('/api/authenticate')
            ->dontSeeJsonValue('zc1415926@126.com')
            ->seeJsonValue('token_not_provided');

        //get authenticated user with authentication
        $this->authUserGet('/api/authenticate/user')
            ->seeJsonKey('user');

        //get all user with authentication
        $this->authUserGet('/api/authenticate')
            ->seeJsonValue('zc1415926@126.com');
    }
}
<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthenticationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        //right credential
        $this->post('/api/authenticate', [
            'email' => 'zc1415926@126.com',
            'password' => 'secret'
        ])->seeJsonKey('token');

        //wrong credential
        $this->post('/api/authenticate', [
            'email' => 'sb@sb',
            'password' => 'sb'
        ])->assertResponseStatus(401);

        //no credential
        $this->post('/api/authenticate')
            ->assertResponseStatus(401);
    }
}

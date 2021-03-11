<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Carbon\Carbon;

class DeletePostTest extends Tests\TestCase
{

    use DatabaseTransactions;

    /**
     * Setup the tests on this page
     */
    public function setUp()
    {
        parent::setUp();

        $this->user = factory(Blog\User::class )->create();

        $this->post = factory( Blog\Post::class )->create();        

    }

    /**
     * Test whether a user can create a post
     */
    public function testUserDeletePost()
    {
        $this->actingAs( $this->user )
            ->json( 'DELETE', '/post/'.$this->post->id)
            ->assertResponseStatus( 200 )

            ->seeInDatabase( 'user', [
                'id' => $this->user->id
            ] )
            ->seeInDatabase( 'post', [
                'user_id' => '',
                'post_id' => '',
                'body' => '',
                'published_at' => ''
            ] );
        
    }   
   
}
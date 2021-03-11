<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostRatingTest extends Tests\TestCase
{    

    use DatabaseTransactions;
    
    /**
     * Setup the tests on this page
     */
    public function setUp()
    {
        parent::setUp();

        $this->user = factory( Blog\User::class )->create();

        $this->post = factory( Blog\Post::class )->create();

        $this->rating = factory( Blog\Rating::class )->create();
    }

    /**
     * Test post rating functionality
     */
    public function testUsersCanRatePost()
    {

        $this->actingAs( $this->user )
            ->json( 'POST', '/post/' . $this->user->id)
            ->assertResponseStatus( 200 )

            ->seeInDatabase( 'posts', [
                'user_id()' => $this->user->id,
                'post_id' => $this->post->id,
                'rating' => int()
            ]
    }
    
}
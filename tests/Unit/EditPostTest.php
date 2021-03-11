<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Carbon\Carbon;

class EditPostTest extends Tests\TestCase
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
     * Test whether a user can edit a post
     */
    public function testUserCanEditPost()
    {

        $this->actingAs( $this->user )
            ->json( 'POST', '/post/' . $this->post->id . '/edit')
            ->assertResponseStatus( 200 )

            ->seeInDatabase( 'user', [
                'id' => $this->user->id
            ] )
            ->seeInDatabase( 'post', [
                'id' => $this->post->id,
                'user_id' => $this->user->id,
                'title' => 'Lorem ipsum dolor',
                'body' => 'Lorem ipsum dolor est vinci pachem',
                'published_at' => Carbon::now()
            ] );
        
    }   
   
}
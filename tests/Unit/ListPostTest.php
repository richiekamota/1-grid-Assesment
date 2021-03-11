<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ListPostTest extends Tests\TestCase
{

    /**
     * Setup the tests on this page
     */
    public function setUp()
    {
        parent::setUp();
            

        $posts = \Blog\Post::all()->first();

    }
    /**
     * Test that a user can view the page
     */
    public function testUserCanSeePostsPage()
    {

        foreach ($posts as $post){
            $this->actingAs( $this->user )
                ->visit('/post/'. $this->post->id)
                ->assertResponseStatus(200);
        }
    }   
    
}
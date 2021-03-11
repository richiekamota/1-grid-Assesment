<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewPageTest extends Tests\TestCase
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
    public function testUserCanViewPage()
    {

        $this->actingAs( $this->user )
            ->visit('/posts/'. $this->application->id)
            ->assertResponseStatus(200);

    }

}
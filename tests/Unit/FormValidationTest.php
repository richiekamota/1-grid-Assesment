<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FormValidationTest extends Tests\TestCase
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

    }    

    /**
     * Test that a post submission fails validation
     */
    public function testPostCreationFailsValidation()
    {
        $this->actingAs( $this->user )
            ->json( 'POST', '/post/create', [
            ] )
            ->assertResponseStatus( 422 );
    }

}
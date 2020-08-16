<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_create_a_student()
    {
        $this->withoutExceptionHandling();
        $response = $this->json('POST','/api/store/student', [

        ]);


        $response->assertStatus(201);


    }
}

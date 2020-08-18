<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Factory;

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
        
        $faker = Factory::create();
        $response = $this->json('POST','/api/store/student', [
            
            'first_name' => $fname = $faker->name,
            'last_name' => $lname = $faker->name,
            'course' => $faker->word,
            'email' => $faker->unique()->safeEmail

        ]);


        $response->assertJsonStructure([
            'first_name','last_name','course','email'
        ])
        
        ->assertStatus(201);


    }
}

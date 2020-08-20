<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Factory;

class StudentControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_create_a_student()
    {
        
        
        $faker = Factory::create();
        $response = $this->json('POST','/api/store/student', [
            
            'first_name' => $fname = $faker->name,
            'last_name' => $lname = $faker->name,
            'course' => $faker->word,
            'email' => $faker->unique()->safeEmail

        ]);
        
        //dd($response);
        $response->assertJsonStructure([
            'first_name','last_name','course','email'
        ])
        
        ->assertStatus(201);

    }

    public function test_we_can_get_a_student()
    {
       
        
       
        $response = $this->json('GET','/api/students/9');
      
        $response->assertStatus(200);

    }

    public function test_we_can_get_all_students()
    {
        
       
        $response = $this->json('GET','/api/students');
      
        $response->assertStatus(200);

    }
}

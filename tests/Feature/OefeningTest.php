<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

class OefeningTest extends TestCase
{
    public function testBasicTest()
    {
        $response = $this->get('/'); // Replace '/' with the route you want to test.

        $response->assertStatus(200); // Ensure the response status code is 200 (OK).
    }
    //public function test_oefening_op_id(){
        //$response = $this->get('api/oefenings/1');
        //$response->assertStatus(200);
         //$response->assertJson(['naamNL'=>'Squat','img'=>'https://thumbs.dreamstime.com/b/gym-boy-squats-icon-cartoon-style-gym-boy-squats-icon-cartoon-gym-boy-squats-vector-icon-web-design-isolated-white-206600307.jpg', ]);
    //}

    //public function test_insert_oefeningen(){
        //Sanctum::actingAs(
            //User::factory()->create(),
            //['view-tasks']
        //);


        //$data = ['naamNL'=>'test', 'naamEN'=>'test', 'omschrijvingNL'=>'omschrijving', 'omschrijvingEN'=>'discription', 'img'=>'test', ];
        //$response = $this->json('POST','api/oefenings', $data);
        // $this->assertDatabaseHas('oefeningen',
        // ['naamNL'=>'test', 'naamEN'=>'test', 'omschrijvingNL'=>'omschrijving', 'omschrijvingEN'=>'discription', 'img'=>'test',]);
        //$response->assertStatus(201);
        // $response->assertJson(['naamNL'=>'test', 'naamEN'=>'test', 'omschrijvingNL'=>'omschrijving', 'omschrijvingEN'=>'discription', 'img'=>'test',]);
    //}
}

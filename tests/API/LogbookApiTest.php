<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogbookApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_logbooks()
    {
        $response = $this->post("/api/logbooks", [
            "name" => "test",
            "lat" => 0.0002,
            "long" => 0.0005,
        ]);
        $response->assertStatus(200);
    }


    public function test_get_logbooks()
    {
        $response = $this->get("/api/logbooks");
        $response->assertStatus(200);
    }

}

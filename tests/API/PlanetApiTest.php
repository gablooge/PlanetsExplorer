<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlanetApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_list_largest_planet()
    {
        $response = $this->get("/api/planets/largest");
        $response->assertStatus(200);
    }


    public function test_terrain_distribution()
    {
        $response = $this->get("/api/planets/distribution/terrain");
        $response->assertStatus(200);
    }

    public function test_resident_distribution()
    {
        $response = $this->get("/api/planets/distribution/resident");
        $response->assertStatus(200);
    }
}

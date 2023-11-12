<?php

namespace Tests\Feature;

use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class FlagControllerTest extends TestCase
{
    /**
     * @return void
     */
    public function test_response_ok()
    {
        $this->withoutMiddleware();
        $response = $this->get('/api/flag-list');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_response_is_not_empty()
    {
        $this->withoutMiddleware();
        $response = $this->get('/api/flag-list');

        $response->assertJson(fn (AssertableJson $json) =>
            $json->has('0.name')
        );
    }

    /**
     * @return void
     */
    public function test_authentication_is_working()
    {
        $response = $this->get('/api/flag-list');

        $response->assertStatus(302);
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class FlagControllerTest extends TestCase
{
    /**
     * @return void
     */
    public function test_response_ok()
    {
        $response = $this->get('/api/flags');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_response_is_not_empty()
    {
        $response = $this->get('/api/flags');

        $response->assertJson(fn (AssertableJson $json) =>
            $json->has('data')
        );
    }
}

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
        $response = $this->get('/api/flag-list');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_response_is_not_empty()
    {
        $response = $this->get('/api/flag-list');

        $response->assertJson(fn (AssertableJson $json) =>
            $json->has('0.name')
        );
    }
}

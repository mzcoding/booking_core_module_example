<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GuideApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_guide_list_a_successful_response(): void
    {
        $response = $this->get('api/guides');

        $response->assertStatus(200)
            ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'experience_years',
                    'is_active',
                ],
            ]
        ]);
    }
}

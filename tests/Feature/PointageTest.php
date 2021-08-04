<?php

namespace Tests\Feature;

use App\Models\Badge;
use App\Models\Pointage;
use App\Models\Role;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class PointageTest extends TestCase
{
    use RefreshDatabase;

    public $user;

    public function setUp(): void
    {
      parent::setUp();
      $this->withHeaders([
        'Accept' => 'application/json',
      ]);
      Role::factory()->create();
      Tenant::factory()->create();
      User::factory()->create();
      Badge::factory()->create();
    }

    /**
     * @test 
     * @group Pointage
     */
    public function api_endpoint_pointages_exists_and_is_not_public() {

        $response = $this->get('/api/pointages');

        $response->assertStatus(401);
    }

    /**
     * @test 
     * @group Pointage
     */
    public function pointages_index_route_returns_list_of_pointages()
    {
        $user = User::first();
        
        $this->actingAs($user);

        Pointage::factory()->create();

        $response = $this->get('/api/pointages');

        $response->assertStatus(200);

        $response->assertJson(fn (AssertableJson $json) =>
        
        $json
             ->has('data', 1)
             ->has('data.0', fn ($json) =>
                $json->where('id', 1)
                     ->etc()
             )
        );
    }
}

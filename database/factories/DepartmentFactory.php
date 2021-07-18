<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepartmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Department::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'name' => $this->faker->department,
           'tenant_id' => Tenant::factory()->create(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Badge;
use App\Models\Pointage;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PointageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pointage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'tenant_id' => Tenant::inRandomOrder()->first()->id,
           'user_id' => User::inRandomOrder()->first()->id,
           'badge_id' => Badge::inRandomOrder()->first()->badge_id,
           'pointage' => $this->faker->dateTimeBetween('-1 year', 'now'),
           'type' => $this->faker->randomElement(['entrant', 'sortant'])
        ];
    }
}
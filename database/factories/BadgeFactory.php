<?php

namespace Database\Factories;

use App\Models\Badge;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BadgeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Badge::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'badge_id' =>  $this->faker->randomNumber(4),
          'tenant_id' => Tenant::inRandomOrder()->first()->id,
          'user_id' => User::inRandomOrder()->first()->id,
          'type' => $this->faker->creditCardType,
          'status' => 0
        ];
    }

     /**
     * Indicates badge.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */

    public function is_badge_GA()
    {
        return $this->state(function (array $attributes) {
            return  [
              'tenant_id' => 1,
              'badge_id' => '93000',
              'user_id' => 2,
              'type' => 'éléctronique',
              'status' => 1
            ];
        });
    }

    public function is_badge_JL()
    {
        return $this->state(function (array $attributes) {
            return  [
              'tenant_id' => 1,
              'badge_id' => '86715',
              'user_id' => 3,
              'type' => 'éléctronique',
              'status' => 1
            ];
        });
    }

    public function is_badge_BS()
    {
        return $this->state(function (array $attributes) {
            return  [
              'tenant_id' => 1,
              'badge_id' => '23807',
              'user_id' => 4,
              'type' => 'éléctronique',
              'status' => 1
            ];
        });
    }

    public function is_badge_EB()
    {
        return $this->state(function (array $attributes) {
            return  [
              'tenant_id' => 1,
              'badge_id' => '31112',
              'user_id' => 5,
              'type' => 'éléctronique',
              'status' => 1
            ];
        });
    }

    public function is_badge_AF()
    {
        return $this->state(function (array $attributes) {
            return  [
              'tenant_id' => 1,
              'badge_id' => '27782',
              'user_id' => 6,
              'type' => 'éléctronique',
              'status' => 1
            ];
        });
    }

    public function is_badge_SB()
    {
        return $this->state(function (array $attributes) {
            return  [
              'tenant_id' => 1,
              'badge_id' => '14',
              'user_id' => 7,
              'type' => 'éléctronique',
              'status' => 1
            ];
        });
    }

    public function is_badge_TD()
    {
        return $this->state(function (array $attributes) {
            return  [
              'tenant_id' => 1,
              'badge_id' => '20845',
              'user_id' => 8,
              'type' => 'éléctronique',
              'status' => 1
            ];
        });
    }

    public function is_badge_commune()
    {
        return $this->state(function (array $attributes) {
            return  [
              'tenant_id' => 2,
              'badge_id' => '10010',
              'user_id' => 10,
              'type' => 'éléctronique',
              'status' => 1
            ];
        });
    }

    public function is_badge_creche()
    {
        return $this->state(function (array $attributes) {
            return  [
              'tenant_id' => 3,
              'badge_id' => '10012',
              'user_id' => 12,
              'type' => 'éléctronique',
              'status' => 1
            ];
        });
    }
}
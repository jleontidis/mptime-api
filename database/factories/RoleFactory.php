<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Role::class;

    public $roles = [
      [
        'slug' => 'super_administrateur',
        'name' => 'Super Administrateur'
      ],[
        'slug' => 'administrateur',
        'name' => 'Administrateur'
      ],
      [
        'slug' => 'editeur',
        'name' => 'Editeur'
      ]
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      return $this->faker->randomElement($this->roles);
    }

    /**
     * Indicate that the user is suspended.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function is_super_admin()
    {
        return $this->state(function (array $attributes) {
            return [
              'slug' => 'super_administrateur',
              'name' => 'Super Administrateur'
            ];
        });
    }

    /**
     * Indicate that the user is suspended.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function is_admin()
    {
        return $this->state(function (array $attributes) {
            return [
              'slug' => 'administrateur',
              'name' => 'Administrateur'
            ];
        });
    }

    /**
     * Indicate that the user is suspended.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function is_editor()
    {
        return $this->state(function (array $attributes) {
            return [
              'slug' => 'editeur',
              'name' => 'Editeur'
            ];
        });
    }
}

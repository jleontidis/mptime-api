<?php

namespace Database\Factories;

use App\Models\Badge;
use App\Models\Role;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'title' => $this->faker->title(),
          'lastname' => $this->faker->lastName(),
          'firstname' => $this->faker->firstName(),
          'date_de_naissance' => $this->faker->date(),
          'email' => $this->faker->unique()->safeEmail,
          'email_verified_at' => now(),
          'password' => Hash::make('password'), // password
          'address' => $this->faker->streetName(),
          'postal_code' => $this->faker->numberBetween(1000,3000),
          'city' => $this->faker->city(),
          'canton' => 'Jura',
          'country' => 'Suisse',
          'telephone_mobile' => $this->faker->phoneNumber,
          'telephone_fixe' => $this->faker->phoneNumber,
          'telephone_professionnel' => $this->faker->phoneNumber,
          'telephone_prive' => $this->faker->phoneNumber,
          'email' => $this->faker->safeEmail(),
          'website' => $this->faker->url(),
          'role_id' => Role::inRandomOrder()->first()->id,
          'tenant_id' => Tenant::inRandomOrder()->first()->id,
          'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicates admin user for dev.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function is_super_admin()
    {
        return $this->state(function (array $attributes) {
            return  [
              'lastname' => 'Partner',
              'firstname' => 'Maths',
              'email' => 'admin@local.test',
              'email_verified_at' => now(),
              'password' => Hash::make('password'), // password
              'role_id' => 1,
              'remember_token' => Str::random(10),
            ];
        });
    }

    /**
     * Indicates user jerome.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function is_jerome()
    {
        return $this->state(function (array $attributes) {
            return  [
              'title' => 'Monsieur',
              'lastname' => 'Leontidis',
              'firstname' => 'Jérôme',
              'email' => 'jerome.leontidis@mathspartner.ch',
              'email_verified_at' => now(),
              'password' => Hash::make('password'), // password
              'role_id' => 2,
              'remember_token' => Str::random(10),
            ];
        });
    }

    /**
     * Indicates user jerome.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function is_gregoire()
    {
        return $this->state(function (array $attributes) {
            return  [
              'title' => 'Monsieur',
              'lastname' => 'Aubry',
              'firstname' => 'Grégoire',
              'email' => 'gregoire.aubry@mathspartner.ch',
              'email_verified_at' => now(),
              'password' => Hash::make('password'), // password
              'role_id' => 3,
              'remember_token' => Str::random(10),
            ];
        });
    }

    /**
     * Indicates user jerome.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function is_stephane()
    {
        return $this->state(function (array $attributes) {
            return  [
              'title' => 'Monsieur',
              'lastname' => 'Bernhard',
              'firstname' => 'Stephan',
              'email' => 'stephan.bernhard@mathspartner.ch',
              'email_verified_at' => now(),
              'password' => Hash::make('password'), // password
              'role_id' => 3,
              'remember_token' => Str::random(10),
            ];
        });
    }

    /**
     * Indicates user jerome.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function is_aurelie()
    {
        return $this->state(function (array $attributes) {
            return  [
              'title' => 'Madame',
              'lastname' => 'Fahrni',
              'firstname' => 'Aurélie',
              'email' => 'aurelie.fahrni@mathspartner.ch',
              'email_verified_at' => now(),
              'password' => Hash::make('password'), // password
              'role_id' => 3,
              'remember_token' => Str::random(10),
            ];
        });
    }

    /**
     * Indicates user jerome.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function is_emilie()
    {
        return $this->state(function (array $attributes) {
            return  [
              'title' => 'Madame',
              'lastname' => 'Boillat',
              'firstname' => 'Emilie',
              'email' => 'emilie.boillat@mathspartner.ch',
              'email_verified_at' => now(),
              'password' => Hash::make('password'), // password
              'role_id' => 3,
              'remember_token' => Str::random(10),
            ];
        });
    }

    /**
     * Indicates user jerome.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function is_sandy()
    {
        return $this->state(function (array $attributes) {
            return  [
              'title' => 'Madame',
              'lastname' => 'Boodhoo',
              'firstname' => 'Sandy',
              'email' => 'sandy.boodhoo@mathspartner.ch',
              'email_verified_at' => now(),
              'password' => Hash::make('password'), // password
              'role_id' => 3,
              'remember_token' => Str::random(10),
            ];
        });
    }

    /**
     * Indicates user jerome.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function is_tiago()
    {
        return $this->state(function (array $attributes) {
            return   [
              'title' => 'Monsieur',
              'lastname' => 'Dos Santos',
              'firstname' => 'Tiago',
              'email' => 'tiago.dossantos@mathspartner.ch',
              'email_verified_at' => now(),
              'password' => Hash::make('password'), // password
              'role_id' => 3,
              'remember_token' => Str::random(10),
            ];
        });
    }

    public function is_commune_admin()
    {
        return $this->state(function (array $attributes) {
            return   [
              'lastname' => 'Administrator',
              'firstname' => 'Commune',
              'email' => 'admin@commune.ch',
              'email_verified_at' => now(),
              'password' => Hash::make('password'), // password
              'role_id' => 2,
              'remember_token' => Str::random(10),
            ];
        });
    }

    public function is_commune_user()
    {
        return $this->state(function (array $attributes) {
            return   [
              'lastname' => 'Utilisateur',
              'firstname' => 'Commune',
              'email' => 'user@commune.ch',
              'email_verified_at' => now(),
              'password' => Hash::make('password'), // password
              'role_id' => 3,
              'remember_token' => Str::random(10),
            ];
        });
    }

    public function is_creche_admin()
    {
        return $this->state(function (array $attributes) {
            return   [
              'lastname' => 'Administrateur',
              'firstname' => 'Crèche',
              'email' => 'admin@creche.ch',
              'email_verified_at' => now(),
              'password' => Hash::make('password'), // password
              'role_id' => 2,
              'remember_token' => Str::random(10),
            ];
        });
    }

    public function is_creche_user()
    {
        return $this->state(function (array $attributes) {
            return   [
              'lastname' => 'Utilisateur',
              'firstname' => 'Crèche',
              'email' => 'user@creche.ch',
              'email_verified_at' => now(),
              'password' => Hash::make('password'), // password
              'role_id' => 3,
              'remember_token' => Str::random(10),
            ];
        });
    }
}

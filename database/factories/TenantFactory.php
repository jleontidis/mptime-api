<?php

namespace Database\Factories;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TenantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tenant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return  [
          'cf_id' => $this->faker->unique()->randomNumber(),
          'cs_id' => $this->faker->unique()->randomNumber(),
          // 'nom_reference' => $this->faker->lastName(),
          'enterprise' => $this->faker->company(),
          // 'title' => $this->faker->title(),
          // 'lastname' => $this->faker->lastName(),
          // 'firstname' => $this->faker->firstName(),
          // 'address' => $this->faker->streetName(),
          // 'postal_code' => $this->faker->numberBetween(1000,3000),
          // 'city' => $this->faker->city(),
          // 'canton' => 'Jura',
          // 'country' => 'Suisse',
          // 'telephone_mobile' => $this->faker->phoneNumber,
          // 'telephone_fixe' => $this->faker->phoneNumber,
          // 'telephone_professionnel' => $this->faker->phoneNumber,
          // 'telephone_prive' => $this->faker->phoneNumber,
          // 'website' => $this->faker->url()
      ];
    }

    /**
     * Indicates user jerome.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function is_mathspartner()
    {
        return $this->state(function (array $attributes) {
            return   [
              'cf_id' => $this->faker->unique()->randomNumber(),
              'cs_id' => $this->faker->unique()->randomNumber(),
              // 'nom_reference' => 'MathsPartner, Grégoire Aubry',
              'enterprise' => 'MathsPartner, Grégoire Aubry',
              // 'title' => 'Monsieur',
              // 'lastname' => 'Aubry',
              // 'firstname' => 'Grégoire',
              // 'address' => 'Rue des Esserts 1',
              // 'postal_code' => '2345',
              // 'city' => 'Les Breuleux',
              // 'canton' => 'Jura',
              // 'country' => 'Suisse',
              // 'telephone_mobile' => '079 654 12 54',
              // 'telephone_fixe' => '032 954 20 04',
              // 'website' => 'https://mathspartner.ch'
          ];
        });
    }

    /**
     * Indicates user jerome.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function is_commune()
    {
        return $this->state(function (array $attributes) {
            return   [
              'cf_id' => $this->faker->unique()->randomNumber(),
              'cs_id' => $this->faker->unique()->randomNumber(),
              // 'nom_reference' => 'Commune des Bois, Gagnebin C.',
              'enterprise' => 'Commune des Bois',
              // 'title' => 'Monsieur',
              // 'lastname' => 'Gagnebin',
              // 'firstname' => 'Claude',
              // 'address' => 'Rue des Esserts 1',
              // 'postal_code' => '2336',
              // 'city' => 'Les Bois',
              // 'canton' => 'Jura',
              // 'country' => 'Suisse',
              // 'telephone_mobile' => '079 654 12 54',
              // 'telephone_fixe' => '032 961 12 37',
              // 'website' => 'https://lesbois.ch'
            ];
        });
    }

    /**
     * Indicates user jerome.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function is_creche()
    {
        return $this->state(function (array $attributes) {
            return   [
              'cf_id' => $this->faker->unique()->randomNumber(),
              'cs_id' => $this->faker->unique()->randomNumber(),
              // 'nom_reference' => 'Association Il Etait Une Fois|Ma Crèche Sous Les Etoiles',
              'enterprise' => 'Ma Crèche Sous Les Etoiles',
              // 'title' => 'Monsieur',
              // 'lastname' => 'Becaud',
              // 'firstname' => 'Francis',
              // 'address' => 'Rue des Esserts 1',
              // 'postal_code' => '2000',
              // 'city' => 'Neuchâtel',
              // 'canton' => 'NE',
              // 'country' => 'Suisse',
              // 'telephone_mobile' => '079 664 07 17',
              // 'telephone_fixe' => '032 535 50 78',
              // 'website' => 'https://lesbois.ch'
            ];
        });
    }
}

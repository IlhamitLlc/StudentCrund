<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Etudiant;



class EtudiantFactory extends Factory
{
    protected $model = Etudiant::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' =>$this->faker->lastName(),
            'prenom' =>$this->faker->firstName(),
            'classe_id' =>rand(1,7)
        ];
    }
}

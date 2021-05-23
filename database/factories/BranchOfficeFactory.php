<?php

namespace Database\Factories;

use App\Models\BranchOffice;
use Illuminate\Database\Eloquent\Factories\Factory;

class BranchOfficeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BranchOffice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'telephone' => $this->faker->e164PhoneNumber,
        ];
    }
}

<?php

namespace Database\Factories;
use App\Models\Contact;


use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{

    protected $model = Contact::class;
    

    public function definition()
    {
        return [
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstname,
            'gender' => $this->faker->numberBetween(1,3),
            'email' =>$this->faker->unique()->safeEmail(),
            'tel' => $this->faker->numberBetween(10000,99999999999),
            'address' => $this->faker->prefecture . $this->faker->city . $this->faker->streetAddress,
            'building' => $this->faker->secondaryAddress,
            'category_id' => $this->faker->numberBetween(1,5),
            'detail' => $this->faker->realText(50),
        ];
    }
}

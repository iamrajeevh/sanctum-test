<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
            $table->integer('emp_id');
            $table->string('name');
            $table->string('mobile');
            $table->string('address');
            $table->timestamps();
        return [
            'emp_id'=> $this->faker->unique->numberBetween(1,1000),
            'name'=>$this->faker->name(),
            'mobile'=>rand(6000000000,9999999999),
            'address'=>$this->faker->name()
        ];
    }
}

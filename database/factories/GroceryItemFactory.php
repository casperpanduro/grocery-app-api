<?php

namespace Database\Factories;

use App\Models\GroceryList;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class GroceryItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(20),
            'user_id' => User::factory()->create(),
            'grocery_list_id' => GroceryList::factory()->create()
        ];
    }
}

<?php

namespace Database\Factories;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::all()->random()->id,  // Lấy ngẫu nhiên order_id
            'product_id' => Product::all()->random()->id,  // Lấy ngẫu nhiên product_id
            'quantity' => $this->faker->numberBetween(1, 10), // Số lượng ngẫu nhiên từ 1 đến 10
            'price' => $this->faker->randomFloat(2, 100, 1000),
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}

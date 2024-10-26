<?php
namespace Database\Factories;

use App\Models\User;

use App\Models\Transaction;
use App\Models\Location;

use Illuminate\Database\Eloquent\Factories\Factory;


class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'amount' => $this->faker->randomFloat(2, 10, 1000),
           'location_id' => Location::factory(), 
            'transaction_date' => $this->faker->date(),
        ];
    }
}


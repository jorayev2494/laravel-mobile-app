<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $users = User::all();
        $users->each(fn(User $user) => $user->addresses()->saveMany(
            Address::factory()->count(random_int(2, 5))->make()
        ));
    }
}

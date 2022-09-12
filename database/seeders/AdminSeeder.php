<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=> 'Admin',
            'family_name'=>'Admin',
            'date_de_naissance'=>Carbon::now()->toDateString(),
            'email' => 'admin@esi.dz',
            'password' => bcrypt('password'),
            'address'=>'address',
            'phoneNumber'=>rand(130, 155),
            'role' => 'administrateur'
        ]);
    }
}

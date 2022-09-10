<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
         $this->call(AdminSeeder::class);
         $this->call(PaysSeeder::class);
         $this->call(WilayasSeeder::class);
         $this->call(DairasSeeder::class);
         $this->call(CommunesSeeder::class);
         $this->call(Bureau_ascaSeeder::class);

         for ($x = 0; $x <= 10; $x++) {//to insert more than one record
        
         $this->call(SignalementsSeeder::class);
         $this->call(AdhesionsSeeder::class);
         $this->call(ContributionsSeeder::class);  
         }  

    }
}

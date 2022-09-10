<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pays')->insert([
            'id' =>1,
            'nom' => Str::random(10),
            'created_at' => Carbon::now()->toDateString(),
            'updated_at' => Carbon::now()->toDateString(),
        ]);
    }
}

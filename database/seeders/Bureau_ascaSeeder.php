<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Bureau_ascaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bureau__asca')->insert([
            'id' =>1,
            'pays_id' =>1,
            'wilayas_id' =>1,
            'dairas_id'=>1,
            'communes_id' =>1,
            'codePostale' =>1234,
            'type' => Str::random(10),
            'localisation' => Str::random(10),
            'date_creation' => Carbon::now()->toDateString(),
        ]);
    }
}

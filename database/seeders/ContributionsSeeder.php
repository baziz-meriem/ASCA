<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
class ContributionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $natureValues = ['environnmentale','sociale', 'economique'];
        $statutValues = ['en attente', 'traité', 'archivé'];
        $id = 1;
        DB::table('contributions')->insert([
            'type' =>'contribution',
            'nature' => $natureValues[rand(0,2)],
            'statut' =>  $statutValues[rand(0,2)],
            'pays' => Str::random(10),
            'wilaya' => Str::random(10),
            'commune' => Str::random(10),
            'daira' => Str::random(10),
            'codePostale' => rand(0,10),
            'maire' => false,
            'deputé' => false,
            'wali' => false,
            'description' => Str::random(10),
            'proposition' => Str::random(10),
            'deleted' => false,
            'user_id' => $id,
            'date_creation' => Carbon::now()->toDateString(),
        ]);
    }
}


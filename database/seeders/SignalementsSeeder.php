<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
class SignalementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $natureValues = ['environnmentale','sociale', 'economique'];
        $statutValues = ['en attente', 'traité', 'archivé'];
        $id = 1;
        DB::table('signalements')->insert([
            'type' =>'signalement',
            'nature' => $natureValues[rand(0,2)],
            'statut' =>  $statutValues[rand(0,2)],
            'pays' => Str::random(10),
            'wilaya' => Str::random(10),
            'commune' => Str::random(10),
            'daira' => Str::random(10),
            'codePostale' => '1558',
            'depassement' => Str::random(10),
            'depass_description' => Str::random(10),
            'voir_respo' => false,
            'conduit' => Str::random(10),
            'solution_propose' => Str::random(10),
            'deleted' => false,
            'user_id' => $id,
            'date_creation' => Carbon::now()->toDateString(),
        ]);
    }
}

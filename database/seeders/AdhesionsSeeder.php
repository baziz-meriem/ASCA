<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class AdhesionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $natureValues = ['environnmentale','sociale','economique'];
        $fonctionValues = ['publique','privé'];
        $statutValues = ['en attente','traité','archivé'];
        $id = 1;$bureauid=1;
        DB::table('adhesions')->insert([
            'type' =>'adhesion',
            'nature' => $natureValues[rand(0,2)],
            'statut' =>  $statutValues[rand(0,2)],
            'niveau_etude' => Str::random(10),
            'filiere' => Str::random(10),
            'secteur' => Str::random(10),
            'sit_familiale' => Str::random(10),
            'nom_Jfille' => Str::random(10),
            'pays' => Str::random(10),
            'adresse' => Str::random(10),
            'code_postal' => Str::random(10),
            'ville' => Str::random(10),
            'fonction' => $fonctionValues[rand(0,1)],
            'deleted' => 'false',
            'user_id' => $id,
            'bureau_id'=>$bureauid,
            'date_creation' => Carbon::now(),
        ]);
     }
}

<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommunesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('communes')->insert([
            'id' =>1,
            'nom' => Str::random(10),
            'dairas_id'=>1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }

    }


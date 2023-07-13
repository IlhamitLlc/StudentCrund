<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("classes")->insert([
            ["libelle"=>"6ème"],
            ["libelle"=>"5ème"],
            ["libelle"=>"4ème"],
            ["libelle"=>"3ème"],
            ["libelle"=>"seconde"],
            ["libelle"=>"première"],
            ["libelle"=>"Terminale"],
        ]);
    }
}

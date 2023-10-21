<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            "name"=>"Elorriesta",
            "created_at"=>now(),
            ]);
        DB::table('departments')->insert([
            "name"=>"Bilbao",
            "created_at"=>now(),
            ]);
        DB::table('departments')->insert([
            "name"=>"Ventas",
            "created_at"=>now(),
            ]);
        DB::table('departments')->insert([
            "name"=>"RRHH",
            "created_at"=>now(),
            ]);
    }
}

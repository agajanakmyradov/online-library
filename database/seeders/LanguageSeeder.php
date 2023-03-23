<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            'name_en' => 'Turkmen',
            'name_tk' => 'Türkmen'
        ]);

        DB::table('languages')->insert([
            'name_en' => 'English',
            'name_tk' => 'Iňlis'
        ]);

        DB::table('languages')->insert([
            'name_en' => 'Turkish',
            'name_tk' => 'Türk'
        ]);

        DB::table('languages')->insert([
            'name_en' => 'Ukrainian',
            'name_tk' => 'Ukrain'
        ]);

        DB::table('languages')->insert([
            'name_en' => 'Russian',
            'name_tk' => 'Rus'
        ]);
    }
}

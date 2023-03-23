<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name_en' => 'Astronomy',
            'name_tk' => 'Astronomiýa'
        ]);

        DB::table('categories')->insert([
            'name_en' => 'Biology',
            'name_tk' => 'Biologiýa'
        ]);

        DB::table('categories')->insert([
            'name_en' => 'Chemistry',
            'name_tk' => 'Himiýa'
        ]);

        DB::table('categories')->insert([
            'name_en' => 'Сomputers',
            'name_tk' => 'Infromatika we Kompýuter ylymlary'
        ]);

        DB::table('categories')->insert([
            'name_en' => "Children's books",
            'name_tk' => 'Çagalar üçin'
        ]);

        DB::table('categories')->insert([
            'name_en' => "History",
            'name_tk' => 'Taryh'
        ]);

        DB::table('categories')->insert([
            'name_en' => "Fiction",
            'name_tk' => 'Çeper eser'
        ]);

        DB::table('categories')->insert([
            'name_en' => "Jurisprudence&Law",
            'name_tk' => 'Hukuk'
        ]);

        DB::table('categories')->insert([
            'name_en' => "Languages",
            'name_tk' => 'Ene dili we daşary ýurt dilleri'
        ]);

        DB::table('categories')->insert([
            'name_en' => "Mathematics",
            'name_tk' => 'Matematika'
        ]);

        DB::table('categories')->insert([
            'name_en' => "Medicine",
            'name_tk' => 'Medisina'
        ]);

        DB::table('categories')->insert([
            'name_en' => "Physics",
            'name_tk' => 'Fizika'
        ]);

        DB::table('categories')->insert([
            'name_en' => "Psychology",
            'name_tk' => 'Psihologiýa'
        ]);

        DB::table('categories')->insert([
            'name_en' => "Poetry",
            'name_tk' => 'Poemalar'
        ]);

        DB::table('categories')->insert([
            'name_en' => "Religion",
            'name_tk' => 'Ylahyýet'
        ]);

        DB::table('categories')->insert([
            'name_en' => "Self-Help",
            'name_tk' => 'Öz-özüňi ösdürmek'
        ]);

        DB::table('categories')->insert([
            'name_en' => "Sport",
            'name_tk' => 'Sport'
        ]);

        DB::table('categories')->insert([
            'name_en' => "Other",
            'name_tk' => 'Başga'
        ]);
    }
}

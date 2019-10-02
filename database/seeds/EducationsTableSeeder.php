<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationsTableSeeder extends Seeder
{
  public function run()
  {
    $educations = [
      ['id' => 1, 'name' => 'Trung học', 'slug' => 'trung-hoc'],
      ['id' => 2, 'name' => 'Trung cấp', 'slug' => 'trung-cap'],
      ['id' => 3, 'name' => 'Cao đẳng', 'slug' => 'cao-dang'],
      ['id' => 4, 'name' => 'Đại học', 'slug' => 'dai-hoc'],
      ['id' => 5, 'name' => 'Trên đại học', 'slug' => 'tren-dai-hoc'],
    ];
    DB::table('educations')->insert($educations);
  }
}
